<?php
/**
 * Copyright (c) Enalean, 2014. All Rights Reserved.
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

namespace Tuleap\Git\REST\v1;

use PFUser;
use Tuleap\Git\REST\v1\GitRepositoryRepresentation;
use GitPermissionsManager;
use GitRepository;

class RepositoryRepresentationBuilder {

    /**
     * @var GitPermissionsManager
     */
    private $permissions_manger;

    public function __construct(GitPermissionsManager $permissions_manger) {
        $this->permissions_manger = $permissions_manger;
    }

    /**
     *
     * @param PFUser $user
     * @param GitRepository $repository
     * @param type $fields
     *
     * @return GitRepositoryRepresentation
     */
    public function build(PFUser $user, GitRepository $repository, $fields) {
        $repository_representation = new GitRepositoryRepresentation();
        $repository_representation->build($repository);

        if ($fields == GitRepositoryRepresentation::FIELDS_ALL && $this->permissions_manger->userIsGitAdmin($user, $repository->getProject())) {
            $permission_representation = new GitRepositoryPermissionRepresentation();
            $permission_representation->build($repository);

            $repository_representation->permissions = $permission_representation;
        }

        return $repository_representation;
    }
}
