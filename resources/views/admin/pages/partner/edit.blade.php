@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Partner</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Partner</a></li>
                    <li class="breadcrumb-item active">Edit Partner</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edit Partner </h5>
                <a href="{{ route('partner.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Partner
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('partner.update',$partner->partner_slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="partner_title">Title</label>
                                <input class="form-control" type="text" name="partner_title" value="{{ $partner->partner_title }}">
                                @error('partner_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="partner_url">Url</label>
                                <input class="form-control" type="url" name="partner_url" value="{{ $partner->partner_url }}">
                                @error('partner_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="partner_order">Order Level</label>
                                <input class="form-control" type="number" name="partner_order" value="{{ $partner->partner_order }}">
                                @error('partner_order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        <div class="col-md-6 my-2">
                            <label for="partner_logo">Partner Logo</label>
                            <input id="partner_image_input" class="form-control" type="file" name="partner_logo" value="{{ old('partner_logo') }}">
                            @error('partner_logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 my-3 d-flex">
                            @if ($partner->partner_logo)
                            <img id="partner_image_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/uploads/partner/'.$partner->partner_logo) }}" alt="Partner Image">
                            @else
                            <img id="partner_image_preview" style="width: 100px" class="m-auto" src="{{ asset('backend/default/no_image.png') }}" alt="Partner Image">
                            @endif
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Partner Update
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
    $('#partner_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#partner_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
