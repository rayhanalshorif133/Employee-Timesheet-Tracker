<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $departments = Department::all();
        $employees = Employee::all();
        return view('room.index', compact('rooms', 'departments', 'employees'));
    }

    public function create(Request $request)
    {
        Room::create($request->all());
        flash()->addSuccess('Room created successfully');
        return redirect()->route('room.index');
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return $this->respondWithSuccess('Room fetched successfully', $room);
    }

    public function update(Request $request)
    {
        $room = Room::find($request->id);
        $room->department_id = $request->department_id;
        $room->employee_id = $request->employee_id;
        $room->save();
        flash()->addSuccess('Room updated successfully');
        return redirect()->route('room.index');
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        flash()->addSuccess('Room deleted successfully');
        return redirect()->route('room.index');
    }
}
