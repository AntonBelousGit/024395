<?php


namespace App\Service;

use App\Repositories\ProjectRepositories;


class ProjectService
{

    protected $projectRepositories;

    public function __construct(ProjectRepositories $projectRepositories)
    {
        $this->projectRepositories = $projectRepositories;
    }

}
