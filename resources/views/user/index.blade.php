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
        <div class="card p-5">
            <div class="card-header d-flex justify-content-between">
                <h5>
                    User List
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createUser">Add New</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email ? $user->email : 'N/A' }}
                                </td>
                                <td>
                                    @if ($user->roles[0]->name == 'admin')
                                        <span class="badge bg-label-primary me-1">{{ $user->roles[0]->name }}</span>
                                    @else
                                        <span class="badge bg-label-info me-1">{{ $user->roles[0]->name }}</span>
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
    </div>
    @include('user.create')
@endsection

{{-- scripts --}}
@push('scripts')
<script>
    $(function(){
        $('#userTable').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });
</script>
@endpush
