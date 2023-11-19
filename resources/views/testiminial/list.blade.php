@extends('layouts.backend.app')

@section('title')
<title>Testimonial | Lists</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testiminial /</span> List</h4>

    <div class="card">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column mt-5">
            <a href="{{ route('testimonialAdd') }}" class="btn btn-outline-primary btn-sm"> + ADD</a>
        </div>


        <div class="table-responsive  text-nowrap">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th>User Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 text-center">
                    @forelse($allTestimonial as $key => $value)
                    <tr class="@if($value->status ==1 )table-success @else table-danger @endif"
                        id="willremove{{ $value->id }}">
                        <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>{{ $value->name }}</strong>
                        </td>
                        <td>{{ $value->designation }} </td>
                        <td>
                            <ul class="list-unstyled">
                                <a href="{{ asset('testimonialImage') }}/{{ $value->image }}" target="_blank">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="{{ $value->name }}">
                                        <img src="{{ asset('testimonialImage') }}/{{ $value->image }}" alt="Avatar"
                                            class="rounded-circle" />
                                    </li>
                                </a>
                            </ul>
                        </td>
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
                                        href="{{ route('testimonialEdit', ['id' => $value->id]) }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item delete text-danger" href="javascript:void(0);"
                                        data-id="{{ $value->id }}"><i class="bx bx-trash me-1"></i>
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
        {{-- Pagination --}}
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="demo-inline-spacing">
                        <!-- Basic Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($allTestimonial->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i
                                            class="tf-icon bx bx-chevrons-left"></i></a>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $allTestimonial->previousPageUrl() }}"><i
                                            class="tf-icon bx bx-chevrons-left"></i></a>
                                </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($allTestimonial->links()->elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                @foreach ($element as $page => $url)
                                @if ($page == $allTestimonial->currentPage())
                                <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                                @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                                @endforeach
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($allTestimonial->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $allTestimonial->nextPageUrl() }}"><i
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
        {{-- / Pagination --}}


    </div>
</div>

@endsection

@section('js')
<script>
    $('.delete').on('click',function(){
            const id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "want to remove this testimonial.",
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
                        url:'{{ route('testimonialDelete') }}',
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