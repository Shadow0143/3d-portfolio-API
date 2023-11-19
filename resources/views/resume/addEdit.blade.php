@extends('layouts.backend.app')

@section('title')
<title>Resume | Add & Edit</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resume/</span> Add, Edit</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('resumeSave') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(!empty($resume))
                <input type="hidden" name="id" id="id" value="{{ $resume->id }}">
                @endif
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Resume Type <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <select name="type" id="type" class="form-control">
                            <option value="">--- Please select type ---</option>
                            <option value="edu" @if(!empty($resume) && $resume->type == 'edu') selected
                                @endif >Education</option>
                            <option value="work" @if(!empty($resume) && $resume->type == 'work') selected
                                @endif >Professional Experience</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Title<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                        <input type="text" class="form-control" name="main_title" id="main_title"
                            placeholder="Main Title" aria-label="John Doe"
                            aria-describedby="basic-icon-default-fullname2" @if(!empty($resume))
                            value="{{ $resume->main_title }}" @endif required />
                    </div>
                </div>



                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">From Year <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                        <input type="text" class="form-control" name="from_year" id="from_year" placeholder="2014"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" @if(!empty($resume))
                            value="{{ $resume->from_year }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">To Year <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                        <input type="text" class="form-control" name="to_year" id="to_year" placeholder="2020"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" @if(!empty($resume))
                            value="{{ $resume->to_year }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Sub Title / Company Name<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                        <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Sub Title"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" @if(!empty($resume))
                            value="{{ $resume->sub_title }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Company Logo (Optional)</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                        <input type="file" class="form-control" name="icons" id="icons" placeholder="Main Title"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Description <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">

                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                            placeholder="Description">  @if(!empty($resume))
                            {{ $resume->description }} @endif </textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Status</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                class="bx bx-status"></i></span>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if(!empty($resume) && $resume->status == 1) selected
                                @endif>Active
                            </option>
                            <option value="0" @if(!empty($resume) && $resume->status == 0) selected @endif>In
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