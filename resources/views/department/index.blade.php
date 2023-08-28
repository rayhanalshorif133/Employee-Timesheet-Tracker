@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Departments /</span> Department List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card py-2 w-50 mx-auto">
            <div class="card-header d-flex justify-content-between">
                <h5>
                    Department List
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createDepartment">Add New</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap px-5 py-3">
                <table class="table table-hover" id="department_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $department->name }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        data-url="{{ route('department.delete', $department->id) }}" id="{{$department->id}}">
                                        <button class="btn btn-sm btn-outline-primary editDepartmentBtn" data-bs-toggle="modal" data-bs-target="#updateDepartment">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                        <a class="btn btn-outline-danger btn-sm itemDeleteBtn" href="javascript:void(0);">
                                            <i class="bx bx-trash"></i>
                                        </a>
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
    @include('department.create')
    @include('department.edit')
@endsection

{{-- scripts --}}
@push('scripts')
    <script>
        $(function() {
            $('#department_table').DataTable({
                "responsive": true,
                "autoWidth": false,
            });

            $(".editDepartmentBtn").click(function(){
                const id = $(this).parent().attr('id');
                axios.get(`/department/${id}/edit`)
                .then(function(res){
                    const data = res.data.data;
                    $("#id").val(data.id);
                    $("#update_name").val(data.name);
                });
            }); 
        });
    </script>
@endpush
