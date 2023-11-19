@extends('layouts.backend.app')

@section('title')
<title>Project | List</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y container-fluid">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Project /</span> List</h4>
    <!-- Basic Bootstrap Table -->

    <div class="card">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column mt-5">
            <a href="{{ route('projectsAdd') }}" class="btn btn-outline-primary btn-sm"> + ADD</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Logo</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($allProjects as $key => $value)
                    <tr id="willremove{{ $value->id }}"
                        class="@if($value->status ==1 )table-success @else table-danger @endif">
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucfirst($value->title)
                                }}</strong>
                        </td>
                        <td class="text-center">
                            <ul class="list-unstyled">
                                <a href="{{ asset('projectsImage') }}/{{ $value->logo }}" target="_blank">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="{{ $value->main_title }}">
                                        <img src="{{ asset('projectsImage') }}/{{ $value->logo }}" alt="Avatar"
                                            class="rounded-circle" />
                                    </li>
                                </a>
                            </ul>
                        </td>
                        <td>{{ $value->link }}</td>

                        <td>
                            @if($value->status == 1)
                            <span class="badge bg-label-success me-1">Active</span>
                            @else
                            <span class="badge bg-label-danger me-1">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-warning"
                                        href="{{ route('projectsEdit', ['id' => $value->id]) }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>

                                    <a class="dropdown-item text-danger delete" href="javascript:void(0);"
                                        data-id="{{ $value->id }}"><i class="bx bx-trash me-1 "></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No data found.</td>
                    </tr>
                    @endforelse()

                </tbody>


            </table>

        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
@endsection


@section('js')
<script>
    $('.delete').on('click',function(){
            const id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "want to remove this resume section.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url:'{{ route('projectsDelete') }}',
                        type:'GET',
                        data:{id:id},
                        success:function(res){
                            $('#willremove'+id).hide();
                            swal("Deleted!", 'Deleted successfully',"success");
                        }
                    })
                } else {
                    swal("Cancelled", "Data save :)", "error");
                }
            });
        })
</script>
@endsection