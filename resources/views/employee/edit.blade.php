<div class="modal fade" id="updateEmployee" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Update Employee
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr/>
            </div>
            <form action="{{ route('employee.update') }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="update_first_name" class="form-label">First Name</label>
                            <input type="text" required id="update_first_name" name="first_name" class="form-control"
                                placeholder="Enter First Name">
                        </div>
                        <div class="col mb-0">
                            <label for="update_last_name" class="form-label">Last Name</label>
                            <input type="text" required id="update_last_name" name="last_name" class="form-control"
                                placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="update_contact_number" class="form-label">Contact Number</label>
                            <input type="text" required id="update_contact_number" name="contact_number"
                                class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="col mb-0">
                            <label for="update_address" class="form-label">Address</label>
                            <input type="text" required id="update_address" name="address" class="form-control"
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
