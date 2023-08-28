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
                            @php
                                $image = $user->image ? asset($user->image) : asset('assets/img/avatars/1.png');
                                $nid_image_font = $user->nid_image_font ? asset($user->nid_image_font) : asset('images/NID-card.jpg');
                                $nid_image_back = $user->nid_image_back ? asset($user->nid_image_back) : asset('images/NID-card.jpg');
                            @endphp
                            <div class="d-flex justify-content-start">
                                <a href="{{ $image }}" data-lightbox="profile_image" data-title="Profile Image">
                                    <img src="{{ $image }}" alt="user-avatar"
                                        class="d-block rounded uploadProfileImagePreview" height="100" width="100"
                                        id="uploadedAvatar" />
                                </a>
                                <div class="button-wrapper px-5">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" name="image"
                                            class="account-file-input updateAndUploadProfileImage" hidden
                                            accept="image/png, image/jpeg" />
                                    </label>
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="d-flex justify-content-start">
                                <div class="mx-5">
                                    <a href="{{ $nid_image_font }}" data-lightbox="nid_image_font"
                                        data-title="NID image font">
                                        <img src="{{ $nid_image_font }}" alt="nid_image_font" class="d-block rounded"
                                            height="130" width="200" id="uploadedAvatar" />
                                        <p class="text-muted mb-0">
                                            NID Card Font
                                        </p>
                                    </a>
                                </div>
                                <div class="mx-5">
                                    <a href="{{ $nid_image_back }}" data-lightbox="nid_image_back"
                                        data-title="NID image back">
                                        <img src="{{ $nid_image_back }}" alt="nid_image_back" class="d-block rounded"
                                            height="130" width="200" id="uploadedAvatar" />
                                        <p class="text-muted mb-0">
                                            NID Card Back
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="username"
                                        class="form-label @role('admin') required @else optional @endrole">Username</label>
                                    <input class="form-control" type="text" name="username" id="username"
                                        placeholder="Enter username" value="{{ $user->username }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="full_name" class="form-label optional">Full Name</label>
                                    <input class="form-control" type="text" id="full_name" name="full_name"
                                        placeholder="Enter user full name" autofocus value="{{ $user->full_name }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email"
                                        class="form-label @role('admin') required @else optional @endrole">E-mail</label>
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
                                    <label for="nationality"
                                        class="form-label @role('user') required @else optional @endrole">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality"
                                        placeholder="Enter user nationality" value="{{ $user->nationality }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label @role('user') required @else optional @endrole"
                                        for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="phoneNumber" name="phone" class="form-control"
                                            placeholder="Enter user phone number" value="{{ $user->phone }}" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="issuing_country" class="form-label optional">Issuing Country</label>
                                    <input type="text" class="form-control" id="issuing_country"
                                        name="issuing_country" placeholder="Enter issuing Country"
                                        value="{{ $user->issuing_country }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="document_type" class="form-label optional">Document type</label>
                                    <input type="text" class="form-control" id="document_type" name="document_type"
                                        placeholder="Enter document type" value="{{ $user->document_type }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="date_of_birth" class="form-label optional">Date of birth</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                        placeholder="Enter date of birth" value="{{ $user->date_of_birth }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="id_expiry_date" class="form-label optional">Id expiry date</label>
                                    <input type="date" class="form-control" id="id_expiry_date" name="id_expiry_date"
                                        placeholder="Enter Id expiry date" value="{{ $user->date_of_birth }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="verification_status">verification_status</label>
                                    <select id="verification_status" class="select2 form-select"
                                        name="verification_status">
                                        <option value="progress" @if ($user->verification_status == 'progress') selected @endif>Progress
                                        </option>
                                        <option value="verified" @if ($user->verification_status == 'verified') selected @endif>Verified
                                        </option>
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
