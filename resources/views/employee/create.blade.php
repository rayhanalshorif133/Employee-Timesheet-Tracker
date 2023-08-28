<div class="modal fade" id="createEmployee" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Add New Employee
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr/>
            </div>
            <form action="{{ route('employee.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" required id="first_name" name="first_name" class="form-control"
                                placeholder="Enter First Name">
                        </div>
                        <div class="col mb-0">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" required id="last_name" name="last_name" class="form-control"
                                placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" required id="contact_number" name="contact_number"
                                class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="col mb-0">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" required id="address" name="address" class="form-control"
                                placeholder="Enter Address">
                        </div>
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
