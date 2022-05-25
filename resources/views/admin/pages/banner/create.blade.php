@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Banner</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Banner</a></li>
                    <li class="breadcrumb-item active">Create Banner</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Create Banner </h5>
                <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Banner
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="banner_title">Banner Title</label>
                                <input class="form-control" type="text" name="banner_title" value="{{ old('banner_title') }}">
                                @error('banner_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="banner_mid_title">Banner Middle Title</label>
                                <input class="form-control" type="text" name="banner_mid_title" value="{{ old('banner_mid_title') }}">
                                @error('banner_mid_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="banner_subtitle">Banner Sub Title</label>
                                <input class="form-control" type="text" name="banner_subtitle" value="{{ old('banner_subtitle') }}">
                                @error('banner_subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        <div class="col-md-6 my-2">
                            <label for="banner_button">Banner Button Name</label>
                            <input class="form-control" type="text" name="banner_button" value="{{ old('banner_button') }}">
                            @error('banner_button')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="banner_url">Banner Url</label>
                            <input class="form-control" type="text" name="banner_url" value="{{ old('banner_url') }}">
                            @error('banner_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="banner_order">Banner Order</label>
                            <input class="form-control" type="number" name="banner_order" value="{{ old('banner_order') }}">
                            @error('banner_order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="banner_image">Banner Image</label>
                            <input id="banner_image_input" class="form-control" type="file" name="banner_image" value="{{ old('banner_image') }}">
                            @error('banner_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2 d-flex">
                            <img id="banner_image_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/default/no_image.png') }}" alt="Banner Image">
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Banner Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Custom Image Upload Preview --}}
<script type="text/javascript">
    // Main Logo
    $('#banner_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#banner_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
