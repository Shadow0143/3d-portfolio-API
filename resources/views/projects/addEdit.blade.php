@extends('layouts.backend.app')

@section('title')
<title>Resume | Add & Edit</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resume/</span> Add, Edit</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('projectsSave') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(!empty($project))
                <input type="hidden" name="id" id="id" value="{{ $project->id }}">
                @endif


                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Title<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                        <input type="text" class="form-control" name="main_title" id="main_title"
                            placeholder="Main Title" aria-label="John Doe"
                            aria-describedby="basic-icon-default-fullname2" @if(!empty($project))
                            value="{{ $project->title }}" @endif required />
                    </div>
                </div>





                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Link<span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                        <input type="text" class="form-control" name="link" id="link" placeholder="Link"
                            aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" @if(!empty($project))
                            value="{{ $project->link }}" @endif required />
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
                            placeholder="Description">  @if(!empty($project))
                            {{ $project->description }} @endif </textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Status</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                class="bx bx-status"></i></span>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if(!empty($project) && $project->status == 1) selected
                                @endif>Active
                            </option>
                            <option value="0" @if(!empty($project) && $project->status == 0) selected @endif>In
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