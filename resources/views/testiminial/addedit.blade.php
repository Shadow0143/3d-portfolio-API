@extends('layouts.backend.app')

@section('title')
<title>Testimonial | Add & Edit</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testiminial /</span> Add, Edit</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('testimonialSave') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(!empty($testimonial))
                <input type="hidden" name="id" id="id" value="{{ $testimonial->id }}">
                @endif
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">User Name <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                class="bx bx-user"></i></span>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                            @if(!empty($testimonial)) value="{{ $testimonial->name }}" @endif required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Designation <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                class="bx bx-money"></i></span>
                        <input type="text" id="designation" name="designation" class="form-control"
                            placeholder="Designation" aria-label="Designation"
                            aria-describedby="basic-icon-default-company2" @if(!empty($testimonial))
                            value="{{ $testimonial->designation }}" @endif required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Image <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-image"></i></span>
                        <input type="file" id="image" name="image" class="form-control" placeholder=""
                            aria-label="john.doe" aria-describedby="basic-icon-default-email2" @if(empty($testimonial))
                            required @endif />
                    </div>
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Video (Optional) </label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-video"></i></span>
                        <input type="file" id="video" name="video" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" />
                    </div>
                </div> --}}


                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Text <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                class="bx bx-comment"></i></span>
                        <textarea id="description" class="form-control" name="description" placeholder="Description !"
                            aria-label="Description !" aria-describedby="basic-icon-default-message2" rows="10"
                            required>@if(!empty($testimonial)) {{ $testimonial->text }} @endif</textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Status</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                class="bx bx-status"></i></span>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if(!empty($testimonial) && $testimonial->status == 1) selected
                                @endif>Active
                            </option>
                            <option value="0" @if(!empty($testimonial) && $testimonial->status == 0) selected @endif>In
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