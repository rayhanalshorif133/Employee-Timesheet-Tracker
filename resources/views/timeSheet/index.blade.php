@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">TimeSheets /</span> TimeSheets List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card py-2">
            <div class="card-header d-flex justify-content-between">
                <h5>
                    TimeSheets List
                </h5>
                <div>
                    <a href="{{route('timesheet.create')}}" class="btn btn-sm btn-outline-primary">
                        Add New
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap px-5 py-3">
                <table class="table table-hover" id="employee_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee name</th>
                            <th>Project name</th>
                            <th>Date</th>
                            <th>Working Hours</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($timeSheets as $timeSheet)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{$timeSheet->employee->first_name }}
                                    {{$timeSheet->employee->last_name}}
                                </td>
                                <td>
                                    {{ $timeSheet->project->name }}
                                </td>
                                <td>
                                    {{ $timeSheet->date }}
                                </td>
                                <td>
                                    {{ $timeSheet->hours_worked }}
                                </td>
                                <td>
                                    {{ $timeSheet->status }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        data-url="{{ route('timesheet.delete', $timeSheet->id) }}">
                                        <a class="btn btn-sm btn-outline-primary" href="{{route('timesheet.edit',$timeSheet->id)}}">
                                            <i class="bx bx-edit"></i>
                                        </a>
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
