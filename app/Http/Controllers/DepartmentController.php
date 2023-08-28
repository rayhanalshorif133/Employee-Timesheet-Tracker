<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    public function create(Request $request)
    {
        Department::create($request->all());
        flash()->addSuccess('department created successfully');
        return redirect()->route('department.index');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return $this->respondWithSuccess('Department fetched successfully', $department);
    }

    public function update(Request $request)
    {
        $department = Department::find($request->id);
        $department->name = $request->name;
        $department->save();
        flash()->addSuccess('Department updated successfully');
        return redirect()->route('department.index');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        flash()->addSuccess('Department deleted successfully');
        return redirect()->route('department.index');
    }
}
