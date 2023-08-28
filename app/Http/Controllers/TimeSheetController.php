<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\TimeSheet;
use Illuminate\Http\Request;

class TimeSheetController extends Controller
{
    public function index()
    {
        $timeSheets = TimeSheet::select()
            ->with('employee')
            ->with('project')
            ->get();
        return view('timeSheet.index', compact('timeSheets'));
    }

    public function create()
    {
        $employees = Employee::all();
        $projects = Project::all();
        return view('timeSheet.create', compact('employees', 'projects'));
    }
    
    public function store(Request $request)
    {
        TimeSheet::create($request->all());
        flash()->addSuccess('Time Sheet created successfully');
        return redirect()->route('timesheet.index');
    }

    public function edit($id)
    {
        $timeSheet = TimeSheet::find($id);
        $employees = Employee::all();
        $projects = Project::all();
        return view('timeSheet.edit', compact('timeSheet', 'employees', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $timeSheet = TimeSheet::find($id);
        $timeSheet->update($request->all());
        flash()->addSuccess('timeSheet updated successfully');
        return redirect()->route('timesheet.index');
    }

    public function destroy($id)
    {
        $timeSheet = TimeSheet::find($id);
        $timeSheet->delete();
        flash()->addSuccess('Time Sheet deleted successfully');
        return redirect()->route('timesheet.index');
    }
}
