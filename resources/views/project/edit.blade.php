<div class="modal fade" id="updateProject" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Update Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr/>
            </div>
            <form action="{{ route('project.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="col mb-0">
                        <label for="update_name" class="form-label">Name</label>
                        <input type="text" required id="update_name" name="name" class="form-control"
                            placeholder="Enter Name">
                    </div>
                    <div class="col mb-0">
                        <label for="update_start_date" class="form-label">start_date</label>
                        <input type="date" required id="update_start_date" name="start_date" class="form-control"
                            placeholder="Enter Start Date">
                    </div>
                    <div class="col mb-0">
                        <label for="update_end_date" class="form-label">end_date</label>
                        <input type="date" required id="update_end_date" name="end_date" class="form-control"
                            placeholder="Enter End Date">
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
