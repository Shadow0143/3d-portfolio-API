@extends('layouts.backend.app')

@section('title')
<title>Skill | Add & Edit</title>
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Skill/</span> Add, Edit</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('skillsSave') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(!empty($skill))
                <input type="hidden" name="id" id="id" value="{{ $skill->id }}">
                @endif
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Skill Name <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                class="bx bx-user"></i></span>
                        <input type="text" class="form-control" name="skill_name" id="skill_name"
                            placeholder="Skill Name" aria-label="John Doe"
                            aria-describedby="basic-icon-default-fullname2" @if(!empty($skill))
                            value="{{ $skill->skill_name }}" @endif required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Icons / Logos <span
                            class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-image"></i></span>
                        <input type="file" id="icons" name="icons" class="form-control" placeholder="" aria-label=""
                            aria-describedby="basic-icon-default-email2" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Status</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                class="bx bx-status"></i></span>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if(!empty($skill) && $skill->status == 1) selected
                                @endif>Active
                            </option>
                            <option value="0" @if(!empty($skill) && $skill->status == 0) selected @endif>In
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