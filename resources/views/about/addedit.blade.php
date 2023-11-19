@extends('layouts.backend.app')

@section('title')
<title>About | Add & Edit</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About Me /</span> Add, Edit</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('aboutMeSave') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(!empty($aboutme))
                <input type="hidden" name="id" id="id" value="{{ $aboutme->id }}">
                @endif
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">My Name <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                class="bx bx-user"></i></span>
                        <input type="text" class="form-control" name="my_name" id="my_name" placeholder="My Name"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" @if(!empty($aboutme))
                            value="{{ $aboutme->my_name }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Title <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                class="bx bx-user"></i></span>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" @if(!empty($aboutme))
                            value="{{ $aboutme->title }}" @endif required />
                    </div>
                </div>



                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Image <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-image"></i></span>
                        <input type="file" id="image" name="image" class="form-control" placeholder=""
                            aria-label="john.doe" aria-describedby="basic-icon-default-email2" @if(empty($aboutme))
                            required @endif />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Banner Image <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-image"></i></span>
                        <input type="file" id="bannerimage" name="bannerimage" class="form-control" placeholder=""
                            aria-label="john.doe" aria-describedby="basic-icon-default-email2" @if(empty($aboutme))
                            required @endif />
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Date Of Birth <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-image"></i></span>
                        <input type="date" id="dob" name="dob" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->dob }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Web Site<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-web"></i></span>
                        <input type="text" id="website" name="website" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->website }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Phone No.<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-phone"></i></span>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->phone }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Address<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-road"></i></span>
                        <input type="text" id="address" name="address" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->address }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Degree<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-file"></i></span>
                        <input type="text" id="degree" name="degree" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->degree }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Contact Email<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-email"></i></span>
                        <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder=""
                            aria-label="" aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->contact_email }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Twitter URL</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-email"></i></span>
                        <input type="url" id="twitter" name="twitter" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->twitter }}" @endif />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Facebook URL </label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-email"></i></span>
                        <input type="url" id="facebook" name="facebook" class="form-control" placeholder=""
                            aria-label="" aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->facebook }}" @endif />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Instgram URL </label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-email"></i></span>
                        <input type="url" id="insta" name="insta" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->insta }}" @endif />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Skype URL </label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-email"></i></span>
                        <input type="url" id="skype" name="skype" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->skype }}" @endif />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Linkedin URL</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-email"></i></span>
                        <input type="url" id="likedin" name="likedin" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" @if(!empty($aboutme))
                            value="{{ $aboutme->likedin }}" @endif />
                    </div>
                </div>




                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Short Description <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                class="bx bx-comment"></i></span>
                        <textarea id="shortdescription" class="form-control" name="shortdescription"
                            placeholder="Short Description !" aria-label="Description !" rows="5"
                            aria-describedby="basic-icon-default-message2"
                            required>@if(!empty($aboutme)) {{ $aboutme->shortdescription }} @endif</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Long Description <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                class="bx bx-comment"></i></span>
                        <textarea id="longdescription" class="form-control" name="longdescription"
                            placeholder="Long Description !" aria-label="Description !" rows="10"
                            aria-describedby="basic-icon-default-message2"
                            required>@if(!empty($aboutme)) {{ $aboutme->longdescription }} @endif</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Status</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                class="bx bx-status"></i></span>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if(!empty($aboutme) && $aboutme->status == 1) selected
                                @endif>Active
                            </option>
                            <option value="0" @if(!empty($aboutme) && $aboutme->status == 0) selected @endif>In
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