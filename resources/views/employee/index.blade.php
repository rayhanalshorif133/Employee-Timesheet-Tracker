@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Employees /</span> Employee List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card py-2">
            <div class="card-header d-flex justify-content-between">
                <h5>
                    Employee List
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createEmployee">Add New</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap px-5 py-3">
                <table class="table table-hover" id="employee_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Contact number</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $employee->first_name }}
                                </td>
                                <td>
                                    {{ $employee->last_name }}
                                </td>
                                <td>
                                    {{ $employee->contact_number }}
                                </td>
                                <td>
                                    {{ $employee->address }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        data-url="{{ route('employee.delete', $employee->id) }}" id="{{$employee->id}}">
                                        <button class="btn btn-sm btn-outline-primary editEmployeeBtn" data-bs-toggle="modal" data-bs-target="#updateEmployee">
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
    @include('employee.create')
    @include('employee.edit')
@endsection

{{-- scripts --}}
@push('scripts')
    <script>
        $(function() {
            $('#employee_table').DataTable({
                "responsive": true,
                "autoWidth": false,
            });

            $(".editEmployeeBtn").click(function(){
                const id = $(this).parent().attr('id');
                axios.get(`/employee/${id}/edit`)
                .then(function(res){
                    console.log(res.data);
                    const data = res.data.data;
                    $("#id").val(data.id);
                    $("#update_first_name").val(data.first_name);
                    $("#update_last_name").val(data.last_name);
                    $("#update_contact_number").val(data.contact_number);
                    $("#update_address").val(data.address);
                });
            }); 
        });
    </script>
@endpush
