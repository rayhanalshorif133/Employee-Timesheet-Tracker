@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Update Time Sheet
                </h5>
            </div>
            <form action="{{ route('timesheet.update',$timeSheet->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="selectEmployee" class="form-label">
                                Select Employee
                            </label>
                            <select class="form-select" id="selectEmployee" name="employee_id">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" 
                                        @if ($timeSheet->employee_id == $employee->id)
                                            selected                                            
                                        @endif
                                        >
                                        {{ $employee->first_name }}
                                        {{ $employee->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="selectProject" class="form-label">
                                Select Project
                            </label>
                            <select class="form-select" id="selectProject" name="project_id">
                                <option value="">Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        @if ($timeSheet->project_id == $project->id)
                                            selected                                            
                                        @endif
                                        >{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" required id="date" name="date" class="form-control" value="{{$timeSheet->date}}">
                        </div>
                        <div class="col mb-0">
                            <label for="hours_worked" class="form-label">Working Hours</label>
                            <input type="number" required id="hours_worked" name="hours_worked" class="form-control"
                                placeholder="Enter hours of worked" value="{{$timeSheet->hours_worked}}">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="description_of_work" class="form-label">Description of Work</label>
                            <textarea class="form-control" id="description_of_work" name="description_of_work" rows="3">{{$timeSheet->description_of_work}}</textarea>
                        </div>
                        <div class="col mb-0">
                            <label for="status" class="form-label">
                                Select Status
                            </label>
                            <select class="form-select" id="status" name="status">
                                <option value="" selected disabled>Select Status</option>
                                <option value="submitted"@if ($timeSheet->status == 'submitted') selected @endif>Submitted</option>
                                <option value="approved"@if ($timeSheet->status == 'approved') selected @endif>Approved</option>
                                <option value="rejected"@if ($timeSheet->status == 'rejected') selected @endif>Rejected</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{route('timesheet.index')}}" class="btn btn-outline-danger">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- scripts --}}
@push('scripts')
@endpush
