@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Rooms /</span> Room List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card py-2 w-75 mx-auto">
            <div class="card-header d-flex justify-content-between">
                <h5>
                    Room List
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createRoom">Add New</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap px-5 py-3">
                <table class="table table-hover" id="room_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Employee Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $room->department->name }}
                                </td>
                                <td>
                                    {{ $room->employee->first_name }}
                                    {{ $room->employee->last_name }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        data-url="{{ route('room.delete', $room->id) }}" id="{{$room->id}}">
                                        <button class="btn btn-sm btn-outline-primary editRoomBtn" data-bs-toggle="modal" data-bs-target="#updateRoom">
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
    @include('room.create')
    @include('room.edit')
@endsection

{{-- scripts --}}
@push('scripts')
    <script>
        $(function() {
            $('#room_table').DataTable({
                "responsive": true,
                "autoWidth": false,
            });

            $(".editRoomBtn").click(function(){
                const id = $(this).parent().attr('id');
                axios.get(`/room/${id}/edit`)
                .then(function(res){
                    const data = res.data.data;
                    console.log(data);
                    $("#room_id").val(data.id);
                    $("#update_selectDepartment").val(data.department_id);
                    $("#update_selectEmployee").val(data.employee_id);
                });
            }); 
        });
    </script>
@endpush
