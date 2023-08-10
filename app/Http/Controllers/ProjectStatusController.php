<?php

namespace App\Http\Controllers;

use App\Models\ProjectStatus;
use App\Http\Requests\StoreProjectStatusRequest;
use App\Http\Requests\UpdateProjectStatusRequest;
use App\Models\Project;

class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectStatus = ProjectStatus::all();
        return view('project_statuses.index', compact('projectStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectStatusRequest $request)
    {
        ProjectStatus::create([
            'name' => $request->name,
        ]);
        $projectStatus = ProjectStatus::all();
        return redirect()->route('project-status.index', ['projectStatus' => $projectStatus]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectStatus $projectStatus)
    {
        $projectStatuses = ProjectStatus::where('id', $projectStatus->id)->get();
        return view('project_statuses.show', compact('projectStatuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectStatus $projectStatus)
    {
        $projectStatuses = ProjectStatus::where('id', $projectStatus->id)->get();
        return view('project_statuses.edit', compact('projectStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectStatusRequest $request, ProjectStatus $projectStatus)
    {
        ProjectStatus::where('id', $projectStatus->id)->update([
            'name' => $request->name,
        ]);
        $projectStatus = ProjectStatus::all();
        return redirect()->route('project-status.index', ['projectStatus' => $projectStatus]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectStatus $projectStatus)
    {
        //
    }
}
