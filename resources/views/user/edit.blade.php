@extends('layouts.app', ['title' => 'Profile Detail & Settings'])

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
                {{ Auth::user()->username }} /</span> Profile
        </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details & Settings</h5>
                    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name"
                                        class="form-label required">Name</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        placeholder="Enter name" value="{{ $user->name }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email"
                                        class="form-label required ">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="Enter user email" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label optional userNewPasswordLabel">Password</label>
                                    <input class="form-control userNewPassword" type="text" id="password"
                                        name="password" placeholder="Enter password" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="password_confirmation"
                                        class="form-label optional userNewPasswordLabel">Password confirmation</label>
                                    <input class="form-control userNewPassword" type="text" id="password_confirmation"
                                        name="password_confirmation" placeholder="Enter confirmation password" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="selectRole" class="form-label required">
                                        Select Role
                                    </label>
                                    <select class="form-select" id="selectRole" name="role" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" @if ($role->name == $user->role) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary mx-1"><i
                                        class='bx bx-arrow-back'></i> Back to User List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- scripts --}}
@push('scripts')
@endpush
