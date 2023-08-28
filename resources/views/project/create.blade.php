<div class="modal fade" id="createProject" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Add New Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr/>
            </div>
            <form action="{{ route('project.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col mb-0">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" required id="name" name="name" class="form-control"
                            placeholder="Enter Name">
                    </div>
                    <div class="col mb-0">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" required id="start_date" name="start_date" class="form-control"
                            placeholder="Enter Start Date">
                    </div>
                    <div class="col mb-0">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" required id="end_date" name="end_date" class="form-control"
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
