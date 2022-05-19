<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProjectFilter;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Service\ProjectService;


class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(FilterRequest $request)
    {

        $data = $request->validated();
        $filter = app()->make(ProjectFilter::class, ['queryParams' => array_filter($data)]);
        $projects = $this->projectService->filter($filter);

        return ProjectResource::collection($projects);
    }

    public function store(CreateProjectRequest $request)
    {
        $project = $this->projectService->store($request->validated());

        return new ProjectResource($project);
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function update(CreateProjectRequest $request, Project $project)
    {
        $new_project = $this->projectService->update($request->validated(), $project);

        return new ProjectResource($new_project);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json(['status'=>'deleted']);
    }
}
