@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">RecycleBin</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">RecycleBin</a></li>
                    <li class="breadcrumb-item active">RecycleBin</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- end page title -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <a href="#">
            <div class="card card-h-60">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">RECYCLE USER</span>
                            <h4 class="mb-3">
                                <span>{{ $user->count() }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </a>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <a href="">
            <div class="card card-h-60">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">RECYCLE SELLER</span>
                            <h4 class="mb-3">
                                <span>0</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </a>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <a href="">
            <div class="card card-h-60">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">RECYCLE PARTNER</span>
                            <h4 class="mb-3">
                                <span>{{ $partner->count() }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </a>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <a href="">
            <div class="card card-h-60">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">RECYCLE PRODUCT</span>
                            <h4 class="mb-3">
                                <span>{{ $product->count() }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </a>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <a href="">
            <div class="card card-h-60">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">RECYCLE PRODUCT BRAND</span>
                            <h4 class="mb-3">
                                <span>{{ $brand->count() }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </a>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <a href="">
            <div class="card card-h-60">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">RECYCLE PRODUCT CATEGORY</span>
                            <h4 class="mb-3">
                                <span>{{ $category->count() }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </a>
    </div><!-- end col -->
</div>
<!-- end row-->
@endsection
