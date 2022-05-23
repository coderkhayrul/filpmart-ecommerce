@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Setting</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                    <li class="breadcrumb-item active">Basic Info</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Basic Information </h5>
                <a href="{{ route('manage.contact.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> Contact Information
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('manage.basic.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="hidden" name="basic_id" value="{{ $data['basic_id'] }}">
                        <div class="row form-group">
                            <div class="col-md-6 ">
                                <label for="name">Company Name</label>
                                <input class="form-control" type="text" name="basic_company" value="{{ $data['basic_company'] }}">
                                @error('basic_company')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="basic_title">Company Title</label>
                                <input class="form-control" type="text" name="basic_title" value="{{ $data['basic_title'] }}">
                                @error('basic_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="phone">Header Logo</label>
                                        <input id="basic_header_logo" class="form-control" type="file" name="basic_header_logo">
                                        @error('basic_header_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 m-auto">
                                        @if ($data['basic_header_logo'])
                                            <img id="header_logo" style="width:100px" src="{{ asset('backend/uploads/setting/'.$data['basic_header_logo']) }}" alt="company logo">
                                        @else
                                            <img id="header_logo" style="width:100px" src="{{ asset('backend/default/no_image.png') }}" alt="company logo"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="phone">Footer Logo</label>
                                        <input id="basic_footer_logo" class="form-control" type="file" name="basic_footer_logo">
                                        @error('basic_footer_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 m-auto">
                                        @if ($data['basic_footer_logo'])
                                            <img id="footer_logo" style="width:100px" src="{{ asset('backend/uploads/setting/'.$data['basic_footer_logo']) }}" alt="company logo">
                                        @else
                                            <img id="footer_logo" style="width:100px" src="{{ asset('backend/default/no_image.png') }}" alt="company logo"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="phone">Favicon</label>
                                        <input id="basic_favicon" class="form-control" type="file" name="basic_favicon">
                                        @error('basic_favicon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 m-auto">
                                        @if ($data['basic_favicon'])
                                            <img id="favicon" style="width:50px" src="{{ asset('backend/uploads/setting/'.$data['basic_favicon']) }}" alt="company logo">
                                        @else
                                            <img id="favicon" style="width:50px" src="{{ asset('backend/default/no_image.png') }}" alt="company logo"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-2 mt-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        <i class="bx bxs-save font-size-16 align-middle me-2"></i> Update Information
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom Image Upload --}}
<script type="text/javascript">
    // Main Logo
    $('#basic_header_logo').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#header_logo').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
    // Footer Logo
    $('#basic_footer_logo').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#footer_logo').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
    // Favicon
    $('#basic_favicon').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#favicon').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>

@endsection
