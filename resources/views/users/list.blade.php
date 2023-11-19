@extends('layouts.backend.app')

@section('title')
<title>Users | List</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> List</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($allUsers as $key => $value)
                    <tr id="willremove{{ $value->id }}" class="table-primary">
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $value->name }}</strong>
                        </td>
                        <td>
                            <a href="mailto:{{ $value->email }}">{{ $value->email }}</a>
                        </td>
                        <td>
                            <a href="tel:+91{{ $value->phone }}">+91{{ $value->phone }}</a>

                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-danger delete" href="javascript:void(0);"
                                        data-id="{{ $value->id }}"><i class="bx bx-trash me-1 "></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No data found.</td>
                    </tr>
                    @endforelse()

                </tbody>


            </table>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="demo-inline-spacing">
                            <!-- Basic Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($allUsers->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="tf-icon bx bx-chevrons-left"></i></a>
                                    </li>
                                    @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $allUsers->previousPageUrl() }}"><i
                                                class="tf-icon bx bx-chevrons-left"></i></a>
                                    </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($allUsers->links()->elements as $element)
                                    {{-- "Three Dots" Separator --}}
                                    @if (is_string($element))
                                    <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
                                    @endif

                                    {{-- Array Of Links --}}
                                    @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                    @if ($page == $allUsers->currentPage())
                                    <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                                    @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($allUsers->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $allUsers->nextPageUrl() }}"><i
                                                class="tf-icon bx bx-chevron-right"></i></a>
                                    </li>
                                    @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"><i class="tf-icon bx bx-chevron-right"></i></a>
                                    </li>
                                    @endif
                                </ul>
                            </nav>



                            <!--/ Basic Pagination -->
                        </div>
                    </div>
                </div>
            </div>
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
                text: "Once user delete, user will no longer be able to login.",
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
                        url:'{{ route('userDelete') }}',
                        type:'GET',
                        data:{id:id},
                        success:function(res){
                            $('#willremove'+id).hide();
                            swal("Deleted!", 'User deleted successfully',"success");
                        }
                    })
                } else {
                    swal("Cancelled", "No user deleted :)", "error");
                }
            });
        })
</script>
@endsection