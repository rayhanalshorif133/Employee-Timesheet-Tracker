<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('room.index', compact('rooms'));
    }

    public function create(Request $request)
    {
        Room::create($request->all());
        flash()->addSuccess('Project created successfully');
        return redirect()->route('project.index');
    }

    public function edit($id)
    {
        $project = Room::find($id);
        return $this->respondWithSuccess('Project fetched successfully', $project);
    }

    public function update(Request $request)
    {
        $project = Room::find($request->id);
        $project->update($request->all());
        flash()->addSuccess('Project updated successfully');
        return redirect()->route('project.index');
    }

    public function destroy($id)
    {
        $project = Room::find($id);
        $project->delete();
        flash()->addSuccess('Project deleted successfully');
        return redirect()->route('project.index');
    }
}
