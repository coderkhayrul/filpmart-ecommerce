@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Category</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                    <li class="breadcrumb-item active">Create Category</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Create Category </h5>
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Category
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="pro_cat_name">Category Name</label>
                                <input class="form-control" type="text" name="pro_cat_name" value="{{ old('pro_cat_name') }}">
                                @error('pro_cat_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @php
                                $categories = App\Models\Category::where('pro_cat_status', 1)->get();
                            @endphp
                            <div class="col-md-6 my-2">
                                <label for="pro_cat_parent">Panent Category</label>
                                <select class="form-control" name="pro_cat_parent" id="pro_cat_parent">
                                    <option label="Select Panent Category"></option>
                                    @foreach ($categories as $data)
                                    <option value="{{ $data->pro_cat_id }}">{{ $data->pro_cat_name }}</option>
                                    @endforeach
                                </select>
                                @error('pro_cat_parent')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="banner_subtitle">Category Order</label>
                                <input class="form-control" type="number" name="pro_cat_order" value="{{ old('pro_cat_order') }}">
                                @error('banner_subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">

                            </div>

                        <div class="col-md-6 my-2">
                            <label for="pro_cat_image">Category Image</label>
                            <input id="category_image_input" class="form-control" type="file" name="pro_cat_image" value="{{ old('pro_cat_image') }}">
                            @error('pro_cat_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2 d-flex">
                            <img id="category_image_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/default/no_image.png') }}" alt="Category Image">
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="pro_cat_icon">Category Icon</label>
                            <input id="category_icon_input" class="form-control" type="file" name="pro_cat_icon" value="{{ old('pro_cat_icon') }}">
                            @error('pro_cat_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2 d-flex">
                            <img id="category_icon_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/default/no_image.png') }}" alt="Banner Image">
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Category Save
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
    // Category Image
    $('#category_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#category_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>

<script type="text/javascript">
    // Category Icon
    $('#category_icon_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#category_icon_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
