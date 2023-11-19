@extends('layouts.backend.app')

@section('title')
<title>Blogs | Add & Edit</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span> Add, Edit</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('blogsSave') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(!empty($blog))
                <input type="hidden" name="id" id="id" value="{{ $blog->id }}">
                @endif
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Title <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                class="bx bx-user"></i></span>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" @if(!empty($blog))
                            value="{{ $blog->title }}" @endif required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Posted By <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                class="bx bx-money"></i></span>
                        <input type="text" id="post_by" name="post_by" class="form-control" placeholder="posted By"
                            aria-label="Designation" aria-describedby="basic-icon-default-company2" @if(!empty($blog))
                            value="{{ $blog->post_by }}" @endif required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Image <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-image"></i></span>
                        <input type="file" id="image" name="image" class="form-control" placeholder=""
                            aria-label="john.doe" aria-describedby="basic-icon-default-email2" @if(empty($blog))
                            required @endif />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Short Description <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                class="bx bx-comment"></i></span>
                        <textarea id="small_description" class="form-control" name="small_description"
                            placeholder="Short Description !" aria-label="Description !"
                            aria-describedby="basic-icon-default-message2"
                            required>@if(!empty($blog)) {{ $blog->small_description }} @endif</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Long Description <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                class="bx bx-comment"></i></span>
                        <textarea id="long_description" class="form-control" name="long_description"
                            placeholder="Long Description !" aria-label="Long Description !"
                            aria-describedby="basic-icon-default-message2"
                            required>@if(!empty($blog)) {{ $blog->long_description }} @endif</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Status</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                class="bx bx-status"></i></span>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if(!empty($blog) && $blog->status == 1) selected
                                @endif>Active
                            </option>
                            <option value="0" @if(!empty($blog) && $blog->status == 0) selected @endif>In
                                active
                            </option>
                        </select>

                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">Save</button>
                <a href="javaScript:void(0);" onclick="window.history.back()" class="btn btn-outline-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection