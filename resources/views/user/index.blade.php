@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Users /</span> User List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">User List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $user->username ? $user->username : 'N/A' }}
                                </td>
                                <td>
                                    {{ $user->email ? $user->email : 'N/A' }}
                                </td>
                                <td>
                                    {{ $user->phone ? $user->phone : 'N/A' }}
                                </td>
                                <td>
                                    @if ($user->roles[0]->name == 'admin')
                                        <span class="badge bg-label-primary me-1">{{ $user->roles[0]->name }}</span>
                                    @else
                                        <span class="badge bg-label-info me-1">{{ $user->roles[0]->name }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->verification_status == 'verified')
                                        <span class="badge bg-label-success me-1">{{ $user->verification_status }}</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">{{ $user->verification_status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        data-url="{{ route('user.delete', $user->id) }}">
                                        <a class="btn btn-outline-info btn-sm" data-id="{{ $user->id }}"
                                            href="{{ route('user.edit', $user->id) }}">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        @if (Auth::user()->id != $user->id)
                                            <a class="btn btn-outline-danger btn-sm itemDeleteBtn"
                                                href="javascript:void(0);">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->

    </div>
@endsection

{{-- scripts --}}
@push('scripts')
@endpush
