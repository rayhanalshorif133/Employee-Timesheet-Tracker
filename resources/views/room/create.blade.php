<div class="modal fade" id="createRoom" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Add New Room
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr />
            </div>
            <form action="{{ route('room.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col mb-0">
                        <label for="selectDepartment" class="form-label">
                            Select Department
                        </label>
                        <select class="form-select" id="selectDepartment" name="department_id">
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="selectEmployee" class="form-label">
                            Select Employee
                        </label>
                        <select class="form-select" id="selectEmployee" name="employee_id">
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
