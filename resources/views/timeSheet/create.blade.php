@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header pt-5 px-5 pb-0">
                <h5 class="card-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Add New Time Sheet
                </h5>
                <hr />
            </div>
            <form action="{{ route('timesheet.store') }}" method="post">
                @csrf
                <div class="card-body px-5">
                    <div class="row g-2 my-2">
                        <div class="col mb-0">
                            <label for="selectEmployee" class="form-label">
                                Select Employee
                            </label>
                            <select class="form-select" id="selectEmployee" name="employee_id">
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name }}
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
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2 my-2">
                        <div class="col mb-0">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" required id="date" name="date" class="form-control"
                                placeholder="Enter Contact Number">
                        </div>
                        <div class="col mb-0">
                            <label for="hours_worked" class="form-label">Working Hours</label>
                            <input type="number" required id="hours_worked" name="hours_worked" class="form-control"
                                placeholder="Enter hours of worked">
                        </div>
                    </div>
                    <div class="row g-2 my-2">
                        {{-- description_of_work --}}
                        <div class="col mb-0">
                            <label for="description_of_work" class="form-label">Description of Work</label>
                            <textarea class="form-control" id="description_of_work" name="description_of_work" rows="3"></textarea>
                        </div>
                        <div class="col mb-0">
                            <label for="status" class="form-label">
                                Select Status
                            </label>
                            <select class="form-select" id="status" name="status">
                                <option value="" selected disabled>Select Status</option>
                                <option value="submitted">Submitted</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer px-5">
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
