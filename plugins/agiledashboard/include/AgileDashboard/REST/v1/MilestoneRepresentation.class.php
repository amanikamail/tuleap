<?php
/**
 * Copyright (c) Enalean, 2013-2014. All Rights Reserved.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
namespace Tuleap\AgileDashboard\REST\v1;

use Tuleap\Project\REST\ProjectReference;
use Tuleap\REST\v1\MilestoneRepresentationBase;
use Planning_Milestone;
use Tuleap\Tracker\REST\TrackerReference;
use Tuleap\Tracker\REST\Artifact\ArtifactReference;
use Tuleap\Tracker\REST\Artifact\BurndownRepresentation;
use Tuleap\REST\JsonCast;
use PlanningFactory;

use AgileDashboard_MilestonesCardwallRepresentation;
use Tuleap\Tracker\REST\TrackerRepresentation;

/**
 * Representation of a milestone
 */
class MilestoneRepresentation extends MilestoneRepresentationBase {

    public function build(Planning_Milestone $milestone, array $status_count, array $backlog_trackers, $has_user_priority_change_permission) {
        $this->id                   = JsonCast::toInt($milestone->getArtifactId());
        $this->uri                  = self::ROUTE . '/' . $this->id;
        $this->label                = $milestone->getArtifactTitle();
        $this->status_value         = $milestone->getArtifact()->getStatus();
        $this->semantic_status      = $milestone->getArtifact()->getSemanticStatusValue();
        $this->submitted_by         = JsonCast::toInt($milestone->getArtifact()->getFirstChangeset()->getSubmittedBy());
        $this->submitted_on         = JsonCast::toDate($milestone->getArtifact()->getFirstChangeset()->getSubmittedOn());
        $this->capacity             = JsonCast::toFloat($milestone->getCapacity());
        $this->remaining_effort     = JsonCast::toFloat($milestone->getRemainingEffort());
        $this->sub_milestone_type   = $this->getSubmilestoneType($milestone);

        $this->planning = new PlanningReference();
        $this->planning->build($milestone->getPlanning());

        $this->project = new ProjectReference();
        $this->project->build($milestone->getProject());

        $this->artifact = new ArtifactReference();
        $this->artifact->build($milestone->getArtifact());

        $this->start_date = null;
        if ($milestone->getStartDate()) {
            $this->start_date              = JsonCast::toDate($milestone->getStartDate());
            $this->number_days_since_start = JsonCast::toInt($milestone->getDaysSinceStart());
        }

        $this->end_date = null;
        if ($milestone->getEndDate()) {
            $this->end_date              = JsonCast::toDate($milestone->getEndDate());
            $this->number_days_until_end = JsonCast::toInt($milestone->getDaysUntilEnd());
        }

        $this->parent = null;
        $parent       = $milestone->getParent();
        if ($parent) {
            $this->parent = new MilestoneParentReference();
            $this->parent->build($parent);
        }

        $this->has_user_priority_change_permission = $has_user_priority_change_permission;

        $this->sub_milestones_uri = $this->uri . '/'. self::ROUTE;
        $this->backlog_uri        = $this->uri . '/'. BacklogItemRepresentation::BACKLOG_ROUTE;
        $this->content_uri        = $this->uri . '/'. BacklogItemRepresentation::CONTENT_ROUTE;
        $this->last_modified_date = JsonCast::toDate($milestone->getLastModifiedDate());
        if($status_count) {
            $this->status_count = $status_count;
        }

        $finder = new \AgileDashboard_Milestone_Pane_Planning_SubmilestoneFinder(
            \Tracker_HierarchyFactory::instance(),
            PlanningFactory::build()
        );
        $submilestone_tracker = $finder->findFirstSubmilestoneTracker($milestone);

        $submilestone_trackers = array();
        if ($submilestone_tracker) {
            $submilestone_tracker_ref = new TrackerReference();
            $submilestone_tracker_ref->build($finder->findFirstSubmilestoneTracker($milestone));
            $submilestone_trackers = array($submilestone_tracker_ref);
        }

        $this->resources['milestones'] = array(
            'uri'    => $this->uri . '/'. self::ROUTE,
            'accept' => array(
                'trackers' => $submilestone_trackers
            )
        );
        $this->resources['backlog'] = array(
            'uri'    => $this->uri . '/'. BacklogItemRepresentation::BACKLOG_ROUTE,
            'accept' => array(
                'trackers' => $this->getTrackersRepresentation($backlog_trackers)
            )
        );
        $this->resources['content'] = array(
            'uri'    => $this->uri . '/'. BacklogItemRepresentation::CONTENT_ROUTE,
            'accept' => array(
                'trackers' => $this->getContentTrackersRepresentation($milestone)
            )
        );
    }

    private function getContentTrackersRepresentation(Planning_Milestone $milestone) {
        return $this->getTrackersRepresentation(
            $milestone->getPlanning()->getBacklogTrackers()
        );
    }

    private function getTrackersRepresentation(array $trackers) {
        $trackers_representation = array();
        foreach ($trackers as $tracker) {
            $tracker_reference = new TrackerReference();
            $tracker_reference->build($tracker);
            $trackers_representation[] = $tracker_reference;
        }
        return $trackers_representation;
    }

    public function enableCardwall() {
        $this->cardwall_uri = $this->uri . '/'. AgileDashboard_MilestonesCardwallRepresentation::ROUTE;
        $this->resources['cardwall'] = array(
            'uri' => $this->cardwall_uri
        );
    }

    public function enableBurndown() {
        $this->burndown_uri = $this->uri . '/'. BurndownRepresentation::ROUTE;
        $this->resources['burndown'] = array(
            'uri' => $this->burndown_uri
        );
    }

    private function getSubmilestoneType(Planning_Milestone $milestone) {
        $submilestone_type = null;
        $child_planning    = PlanningFactory::build()->getChildrenPlanning($milestone->getPlanning());

        if ($child_planning) {
            $tracker_reference = new TrackerReference();
            $tracker_reference->build($child_planning->getPlanningTracker());

            $submilestone_type = $tracker_reference;
        }

        return $submilestone_type;
    }
}
