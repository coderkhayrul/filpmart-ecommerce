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
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edit Category </h5>
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Category
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('category.update',$category->pro_cat_slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="pro_cat_name">Category Name</label>
                                <input class="form-control" type="text" name="pro_cat_name" value="{{ $category->pro_cat_name }}">
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
                                    <option value="{{ $data->pro_cat_id }}" {{ $data->pro_cat_id == $category->pro_cat_parent ? 'selected' : ''}}>{{ $data->pro_cat_name }}</option>
                                    @endforeach
                                </select>
                                @error('pro_cat_parent')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="banner_subtitle">Category Order</label>
                                <input class="form-control" type="number" name="pro_cat_order" value="{{ $category->pro_cat_order }}">
                                @error('banner_subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="banner_subtitle">Category Icon (<span class="text-danger">font awesome 4*</span>)</label>
                                <input class="form-control" type="text" name="pro_cat_icon" value="{{ $category->pro_cat_icon }}" placeholder="example: fa fa-product-hunt">
                                @error('pro_cat_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2 my-2" style="padding-top: 1.5rem!important;">
                                @if ($category->pro_cat_icon)
                                <i style="font-size:3em;" class="{{ $data['pro_cat_icon'] }}" aria-hidden="true"></i>
                                @else
                                <img id="category_icon" style="width:50px"
                                src="{{ asset('backend/default/no_image.png') }}"
                                alt="Category Icon">
                                @endif
                            </div>

                        <div class="col-md-6 my-2">
                            <label for="pro_cat_image">Category Image</label>
                            <input id="category_image_input" class="form-control" type="file" name="pro_cat_image" value="{{ old('pro_cat_image') }}">
                            @error('pro_cat_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2 d-flex">
                            @if ($category->pro_cat_image)
                            <img id="category_image_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/uploads/category/'.$category->pro_cat_image) }}" alt="Category Image">
                            @else
                            <img id="category_image_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/default/no_image.png') }}" alt="Category Image">
                            @endif
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Category Update
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
@endsection
