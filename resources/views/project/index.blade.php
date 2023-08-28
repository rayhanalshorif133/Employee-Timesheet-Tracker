@extends('layouts.app')

{{-- styles --}}
@push('styles')
    <style>
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Projects /</span> Project List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card py-2">
            <div class="card-header d-flex justify-content-between">
                <h5>
                    Project List
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createProject">Add New</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap px-5 py-3">
                <table class="table table-hover" id="project_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $project->name }}
                                </td>
                                <td>
                                    {{ $project->start_date }}
                                </td>
                                <td>
                                    {{ $project->end_date }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        data-url="{{ route('project.delete', $project->id) }}" id="{{$project->id}}">
                                        <button class="btn btn-sm btn-outline-primary editProjectBtn" data-bs-toggle="modal" data-bs-target="#updateProject">
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
    @include('project.create')
    @include('project.edit')
@endsection

{{-- scripts --}}
@push('scripts')
    <script>
        $(function() {
            $('#project_table').DataTable({
                "responsive": true,
                "autoWidth": false,
            });

            $(".editProjectBtn").click(function(){
                const id = $(this).parent().attr('id');
                axios.get(`/project/${id}/edit`)
                .then(function(res){
                    const data = res.data.data;
                    $("#id").val(data.id);
                    $("#update_name").val(data.name);
                    $("#update_start_date").val(data.start_date);
                    $("#update_end_date").val(data.end_date);
                });
            }); 
        });
    </script>
@endpush
