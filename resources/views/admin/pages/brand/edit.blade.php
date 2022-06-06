@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Brands</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Brand</a></li>
                    <li class="breadcrumb-item active">All Brand</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    {{-- Brand Create --}}
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edit Brand </h5>
                <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Brand
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('brand.update',$brand->brand_slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 my-2">
                            <label for="brand_name">Name</label>
                            <input class="form-control" type="text" name="brand_name" value="{{ $brand->brand_name }}">
                            @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="brand_remarks">Remarks</label>
                            <input class="form-control" type="text" name="brand_remarks" value="{{ $brand->brand_remarks }}">
                            @error('brand_remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-4">
                            <div class="form-check form-switch" dir="ltr">
                                <input name="brand_feature" type="checkbox" {{ $brand->brand_feature == 1 ? 'checked' : '' }} class="form-check-input">
                                <label class="form-check-label">Feature Brand</label>
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <label for="brand_image">Brand Image</label>
                            <input id="brand_image_input" class="form-control" type="file" name="brand_image" value="{{ old('brand_image') }}">
                            @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2 d-flex justify-content-center">
                            @if ($brand->brand_image)
                                <img style="width:100px" id="brand_image_preview" class="img-fluid rounded" src="{{ asset('backend/uploads/brand/'.$brand->brand_image) }}"
                                alt="Brand Image">
                            @else
                                <img style="width:100px" id="brand_image_preview" class="img-fluid rounded" src="{{ asset('backend/default/no-image-pro.png') }}"
                                alt="Brand Image">
                            @endif
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Brand Update
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
    $('#brand_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#brand_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection

@section('custom-css')
<!-- DataTables -->
<link href="{{ asset('backend') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('backend') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
@endsection

@section('custom-script')
<!-- Required datatable js -->
<script src="{{ asset('backend') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('backend') }}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('backend') }}/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('backend') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('backend') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('backend') }}/js/pages/datatables.init.js"></script>
@endsection
