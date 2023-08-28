<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create(Request $request)
    {
        Employee::create($request->all());
        flash()->addSuccess('Employee created successfully');
        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return $this->respondWithSuccess('Employee fetched successfully', $employee);
    }

    public function update(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->update($request->all());
        flash()->addSuccess('Employee updated successfully');
        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        flash()->addSuccess('Employee deleted successfully');
        return redirect()->route('employee.index');
    }
}
