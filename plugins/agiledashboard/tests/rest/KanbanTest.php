<?php
/**
 * Copyright (c) Enalean, 2014-2015. All rights reserved
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/
 */

require_once dirname(__FILE__).'/bootstrap.php';

/**
 * @group KanbanTests
 */
class KanbanTest extends RestBase {

    protected function getResponse($request) {
        return $this->getResponseByToken(
            $this->getTokenForUserName(REST_TestDataBuilder::TEST_USER_1_NAME),
            $request
        );
    }

    public function testOPTIONSKanban() {
        $response = $this->getResponse($this->client->options('kanban'));
        $this->assertEquals(array('OPTIONS'), $response->getHeader('Allow')->normalize()->toArray());
    }

    public function testGETKanban() {
        $response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $kanban   = $response->json();

        $this->assertEquals('My first kanban', $kanban['label']);
        $this->assertEquals(REST_TestDataBuilder::KANBAN_TRACKER_ID, $kanban['tracker']['id']);

        $this->assertEquals('Archive', $kanban['archive']['label']);
        $this->assertArrayHasKey('user_can_add_in_place', $kanban['backlog']);
        $this->assertArrayHasKey('user_can_add_in_place', $kanban['columns'][0]);
        $this->assertNull($kanban['columns'][0]['limit']);
    }

    public function testPATCHKanban() {
        $this->assertThatLabelIsUpdated("Willy's really weary");
        $this->assertThatLabelIsUpdated("My first kanban"); // go back to original value
        $this->assertThatBacklogIsToggled();
        $this->assertThatArchiveIsToggled();
        $this->assertThatColumnIsToggled();
    }

    private function assertThatBacklogIsToggled() {
        $initial_state_response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $initial_state_kanban   = $initial_state_response->json();
        $this->assertFalse($initial_state_kanban['backlog']['is_open']);

        $patch_response = $this->getResponse($this->client->patch(
            'kanban/'. REST_TestDataBuilder::KANBAN_ID,
            null,
            json_encode(
                array(
                    'collapse_backlog' => false
                )
            )
        ));
        $this->assertEquals($patch_response->getStatusCode(), 200);

        $new_state_response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $new_state_kanban   = $new_state_response->json();
        $this->assertTrue($new_state_kanban['backlog']['is_open']);
    }

    private function assertThatArchiveIsToggled() {
        $initial_state_response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $initial_state_kanban   = $initial_state_response->json();
        $this->assertFalse($initial_state_kanban['archive']['is_open']);

        $patch_response = $this->getResponse($this->client->patch(
            'kanban/'. REST_TestDataBuilder::KANBAN_ID,
            null,
            json_encode(
                array(
                    'collapse_archive' => false
                )
            )
        ));
        $this->assertEquals($patch_response->getStatusCode(), 200);

        $new_state_response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $new_state_kanban   = $new_state_response->json();
        $this->assertTrue($new_state_kanban['archive']['is_open']);
    }

    private function assertThatColumnIsToggled() {
        $initial_state_response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $initial_state_kanban   = $initial_state_response->json();
        $first_column = $initial_state_kanban['columns'][0];
        $this->assertTrue($first_column['is_open']);

        $patch_response = $this->getResponse($this->client->patch(
            'kanban/'. REST_TestDataBuilder::KANBAN_ID,
            null,
            json_encode(
                array(
                    'collapse_column' => array(
                        'column_id' => $first_column['id'],
                        'value'     => true
                    )
                )
            )
        ));
        $this->assertEquals($patch_response->getStatusCode(), 200);

        $new_state_response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $new_state_kanban   = $new_state_response->json();
        $new_state_first_column = $new_state_kanban['columns'][0];
        $this->assertFalse($new_state_first_column['is_open']);
    }

    private function assertThatLabelIsUpdated($new_label) {
        $patch_response = $this->getResponse($this->client->patch(
            'kanban/'. REST_TestDataBuilder::KANBAN_ID,
            null,
            json_encode(
                array(
                    'label' => $new_label
                )
            )
        ));
        $this->assertEquals($patch_response->getStatusCode(), 200);

        $response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));
        $kanban   = $response->json();

        $this->assertEquals($new_label, $kanban['label']);

    }

    public function testGETBacklog() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID .'/backlog';

        $response = $this->getResponse($this->client->get($url))->json();

        $this->assertEquals(2, $response['total_size']);
        $this->assertEquals('Do something', $response['collection'][0]['label']);
        $this->assertEquals('Do something v2', $response['collection'][1]['label']);
    }

    /**
     * @depends testGETBacklog
     */
    public function testPATCHBacklog() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID.'/backlog';

        $response = $this->getResponse($this->client->patch(
            $url,
            null,
            json_encode(array(
                'order' => array(
                    'ids'         => array(16),
                    'direction'   => 'after',
                    'compared_to' => 17
                )
            ))
        ));
        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals(
            array(
                17,
                16,
            ),
            $this->getIdsOrderedByPriority($url)
        );
    }

    public function testGETItems() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID .'/items?column_id='. REST_TestDataBuilder::KANBAN_ONGOING_COLUMN_ID;

        $response = $this->getResponse($this->client->get($url))->json();

        $this->assertEquals(2, $response['total_size']);
        $this->assertEquals('Doing something', $response['collection'][0]['label']);
        $this->assertEquals('Doing something v2', $response['collection'][1]['label']);
        $this->assertArrayHasKey('timeinfo', $response['collection'][0]);
        $this->assertArrayHasKey('timeinfo', $response['collection'][1]);
    }

    /**
     * @depends testGETItems
     */
    public function testPATCHItems() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID.'/items?column_id='. REST_TestDataBuilder::KANBAN_ONGOING_COLUMN_ID;

        $response = $this->getResponse($this->client->patch(
            $url,
            null,
            json_encode(array(
                'order' => array(
                    'ids'         => array(18),
                    'direction'   => 'after',
                    'compared_to' => 19
                )
            ))
        ));
        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals(
            array(
                19,
                18,
            ),
            $this->getIdsOrderedByPriority($url)
        );
    }

    private function getIdsOrderedByPriority($uri) {
        $response     = $this->getResponse($this->client->get($uri))->json();
        $actual_order = array();
        $collection   = $response['collection'];

        foreach($collection as $kanban_backlog_item) {
            $actual_order[] = $kanban_backlog_item['id'];
        }

        return $actual_order;
    }

    public function testGETArchive() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID .'/archive';

        $response = $this->getResponse($this->client->get($url))->json();

        $this->assertEquals(2, $response['total_size']);
        $this->assertEquals('Something archived', $response['collection'][0]['label']);
        $this->assertEquals('Something archived v2', $response['collection'][1]['label']);
    }

    /**
     * @depends testGETArchive
     */
    public function testPATCHArchive() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID.'/archive';

        $response = $this->getResponse($this->client->patch(
            $url,
            null,
            json_encode(array(
                'order' => array(
                    'ids'         => array(20),
                    'direction'   => 'after',
                    'compared_to' => 21
                )
            ))
        ));
        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals(
            array(
                21,
                20,
            ),
            $this->getIdsOrderedByPriority($url)
        );
    }

    /**
     * @depends testPATCHArchive
     */
    public function testPATCHBacklogWithAdd() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID.'/backlog';

        $response = $this->getResponse($this->client->patch(
            $url,
            null,
            json_encode(array(
                'add' => array(
                    'ids' => array(21)
                )
            ))
        ));
        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals(
            array(
                17,
                16,
                21
            ),
            $this->getIdsOrderedByPriority($url)
        );
    }

    /**
     * @depends testPATCHBacklogWithAdd
     */
    public function testPATCHColumnWithAddAndOrder() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID.'/items?column_id='. REST_TestDataBuilder::KANBAN_ONGOING_COLUMN_ID;

        $response = $this->getResponse($this->client->patch(
            $url,
            null,
            json_encode(array(
                'add' => array(
                    'ids' => array(21)
                ),
                'order' => array(
                    'ids'         => array(21),
                    'direction'   => 'after',
                    'compared_to' => 19
                )
            ))
        ));
        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals(
            array(
                19,
                21,
                18
            ),
            $this->getIdsOrderedByPriority($url)
        );
    }

    /**
     * @depends testPATCHColumnWithAddAndOrder
     */
    public function testPATCHArchiveWithAddAndOrder() {
        $url = 'kanban/'. REST_TestDataBuilder::KANBAN_ID.'/archive';

        $response = $this->getResponse($this->client->patch(
            $url,
            null,
            json_encode(array(
                'add' => array(
                    'ids' => array(21)
                ),
                'order' => array(
                    'ids'         => array(21),
                    'direction'   => 'after',
                    'compared_to' => 20
                )
            ))
        ));
        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals(
            array(
                20,
                21
            ),
            $this->getIdsOrderedByPriority($url)
        );
    }

    /**
     * @depends testPATCHArchiveWithAddAndOrder
     */
    public function testOPTIONSKanbanItems() {
        $response = $this->getResponse($this->client->options('kanban_items'));
        $this->assertEquals(array('OPTIONS', 'POST'), $response->getHeader('Allow')->normalize()->toArray());
    }

    /**
     * @depends testPATCHArchiveWithAddAndOrder
     */
    public function testPOSTKanbanItemsInBacklog() {
        $url = 'kanban_items/';

        $response = $this->getResponse($this->client->post(
            $url,
            null,
            json_encode(array(
                "item" => array(
                    "label"     => "New item in backlog",
                    "kanban_id" => REST_TestDataBuilder::KANBAN_ID,
                )
            ))
        ));

        $this->assertEquals($response->getStatusCode(), 201);

        $item = $response->json();
        $this->assertEquals($item['label'], "New item in backlog");
    }

    /**
     * @depends testPOSTKanbanItemsInBacklog
     */
    public function testPOSTKanbanItemsInColmun() {
        $url = 'kanban_items/';

        $response = $this->getResponse($this->client->post(
            $url,
            null,
            json_encode(array(
                "item" => array(
                    "label"     => "New item in column",
                    "kanban_id" => REST_TestDataBuilder::KANBAN_ID,
                    "column_id" => REST_TestDataBuilder::KANBAN_ONGOING_COLUMN_ID,
                )
            ))
        ));

        $this->assertEquals($response->getStatusCode(), 201);

        $item = $response->json();
        $this->assertEquals($item['label'], "New item in column");
    }

    /**
     * @expectedException Guzzle\Http\Exception\ClientErrorResponseException
     * @depends testPOSTKanbanItemsInColmun
     */
    public function testPOSTKanbanItemsInUnknowColmun() {
        $url = 'kanban_items/';

        $response = $this->getResponse($this->client->post(
            $url,
            null,
            json_encode(array(
                "item" => array(
                    "label"     => "New item in column",
                    "kanban_id" => REST_TestDataBuilder::KANBAN_ID,
                    "column_id" => 99999999,
                )
            ))
        ));

        $this->assertEquals($response->getStatusCode(), 400);
    }

    /**
     * @depends testPOSTKanbanItemsInUnknowColmun
     */
    public function testDELETEKanban() {
        $response = $this->getResponse($this->client->delete('kanban/'. REST_TestDataBuilder::KANBAN_ID));

        $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
     * @expectedException Guzzle\Http\Exception\ClientErrorResponseException
     * @depends testDELETEKanban
     */
    public function testGETDeletedKanban() {
        $response = $this->getResponse($this->client->get('kanban/'. REST_TestDataBuilder::KANBAN_ID));

        $this->assertEquals($response->getStatusCode(), 404);
    }
}
