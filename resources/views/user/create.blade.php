<div class="modal fade" id="createUser" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">
                    <i class="bx bx-plus"></i>
                    Add New User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr />
            </div>
            <form action="{{ route('user.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col mb-0">
                        <label for="name" class="form-label required">Name</label>
                        <input type="text" required id="name" name="name" class="form-control"
                            placeholder="Enter Name">
                    </div>
                    <div class="col mb-0">
                        <label for="email" class="form-label required">E-mail</label>
                        <input type="text" required id="email" name="email" class="form-control"
                            placeholder="Enter email">
                    </div>
                    <div class="col mb-0">
                        <label for="selectRole" class="form-label required">
                            Select Role
                        </label>
                        <select class="form-select" id="selectRole" name="role" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="password" class="form-label required userNewPasswordLabel">Password</label>
                        <input class="form-control userNewPassword" type="text" id="password"
                            name="password" placeholder="Enter password" required/>
                    </div>
                    <div class="col mb-0">
                        <label for="password_confirmation"
                            class="form-label required userNewPasswordLabel">Password confirmation</label>
                        <input class="form-control userNewPassword" type="text" id="password_confirmation"
                            name="password_confirmation" placeholder="Enter confirmation password" required/>
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
