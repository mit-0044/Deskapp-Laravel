<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectStatus;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projectStatuses = ProjectStatus::all();
        $clients = Client::all();
        return view('projects.create', compact(['projectStatuses', 'clients']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'project_status_id' => $request->project_status_id,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'budget' => $request->budget,
        ]);
        $projects = Project::all();
        return redirect()->route('project.index', ['projects' => $projects]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project_status = ProjectStatus::where('id', $project->id)->first();
        $projects = Project::where('id', $project->id)->get();
        $clients = Client::where('id', $project->id)->get();
        $client = $clients[0]->first_name . ' ' . $clients[0]->last_name;
        $project_status = $project_status->name;
        return view('projects.show', compact(['projects', 'client', 'project_status']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $projectStatuses = ProjectStatus::all();
        $clients = Client::all();
        $projects = Project::where('id', $project->id)->get();
        return view('projects.edit', compact(['projectStatuses', 'clients', 'projects']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        Project::where('id', $project->id)->update([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'project_status_id' => $request->project_status_id,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'budget' => $request->budget,
        ]);
        $projects = Project::all();
        return redirect()->route('project.index', ['projects' => $projects]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);
        $projects = Project::all();
        return redirect()->route('project.index', ['projects' => $projects]);
    }

}
