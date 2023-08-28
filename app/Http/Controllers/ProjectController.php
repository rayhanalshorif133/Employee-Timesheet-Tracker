<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    public function create(Request $request)
    {
        Project::create($request->all());
        flash()->addSuccess('Project created successfully');
        return redirect()->route('project.index');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return $this->respondWithSuccess('Project fetched successfully', $project);
    }

    public function update(Request $request)
    {
        $project = Project::find($request->id);
        $project->update($request->all());
        flash()->addSuccess('Project updated successfully');
        return redirect()->route('project.index');
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        flash()->addSuccess('Project deleted successfully');
        return redirect()->route('project.index');
    }
}
