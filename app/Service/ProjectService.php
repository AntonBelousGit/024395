<?php


namespace App\Service;

use App\Models\Project;
use App\Repositories\ProjectRepositories;

class ProjectService
{

    protected $projectRepositories;

    public function __construct(ProjectRepositories $projectRepositories)
    {
        $this->projectRepositories = $projectRepositories;
    }

    public function filter($filter)
    {
        return $this->projectRepositories->filter($filter);
    }

    public function store($data)
    {
      return  Project::create($data);
    }

    public function update($data,$project)
    {
      $project->update($data);
      return $project;
    }

}
