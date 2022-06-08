@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Create Product</h5>
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Product
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="product_name">Product Name</label>
                                <input class="form-control" type="text" name="product_name" value="{{ old('product_name') }}">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @php
                                $categories = App\Models\Category::where('pro_cat_status', 1)->get();
                            @endphp
                            <div class="col-md-6 my-2">
                                <label for="pro_category_id">Product Category</label>
                                <select class="form-control" name="pro_category_id" id="">
                                    <option label="Select Category"></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->pro_cat_id }}">{{ $category->pro_cat_name }}</option>
                                    @endforeach
                                </select>
                                @error('pro_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @php
                                $brands = App\Models\Brand::where('brand_status', 1)->get();
                            @endphp
                            <div class="col-md-6 my-2">
                                <label for="brand_id">Product Brand</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    <option label="Select Brand"></option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        <div class="col-md-6 my-2">
                            <label for="product_price">Product Price</label>
                            <input class="form-control" type="number" name="product_price" value="{{ old('product_price') }}">
                            @error('product_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="product_discount_price">Product Discount Price</label>
                            <input class="form-control" type="number" name="product_discount_price" value="{{ old('product_discount_price') }}">
                            @error('product_discount_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="product_order">Product Order</label>
                            <input class="form-control" type="number" name="product_order" value="{{ old('product_order') }}">
                            @error('product_order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="product_quantity">Product Quantity</label>
                            <input class="form-control" min="1" type="number" name="product_quantity" value="{{ old('product_quantity') }}">
                            @error('product_quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="product_unit">Product Unit</label>
                            <input class="form-control" type="text" name="product_unit" value="{{ old('product_unit') }}">
                            @error('product_unit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="product_feature">Product Feature</label>
                            <div class="form-check form-switch" dir="ltr">
                                <input name="product_feature" type="checkbox" class="form-check-input">
                                <label class="form-check-label">Feature Product</label>
                            </div>
                            @error('product_feature')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="product_image">Product Image</label>
                            <input id="product_image_input" class="form-control" type="file" name="product_image" value="{{ old('product_image') }}">
                            @error('product_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="product_gallery">Product Gallery Image</label>
                            <input class="form-control" multiple type="file" name="product_gallery[]" value="{{ old('product_gallery') }}">
                            @error('product_gallery')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2 d-flex">
                            <img id="product_image_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/default/no_image.png') }}" alt="Banner Image">
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="product_detils">Product Details</label>
                            <textarea class="form-control" name="product_detils" id="ckeditor-classic-1"></textarea>
                            @error('product_detils')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label for="product_description">Product Description</label>
                            <textarea class="form-control" name="product_description" id="ckeditor-classic-2"></textarea>
                            @error('product_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Product Save
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
    $('#product_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#product_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
@section('custom-script')
<!-- ckeditor -->
<script src="{{ asset('backend') }}/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- init js -->
<script src="{{ asset('backend') }}/js/pages/form-editor.init.js"></script>
@endsection


