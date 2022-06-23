@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Coupon</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Coupon</a></li>
                    <li class="breadcrumb-item active">Update Coupon</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Update Coupon </h5>
                <a href="{{ route('coupon.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Coupon
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('coupon.update',$coupon->coupon_slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-6 my-2">
                                <label for="coupon_title">Title</label>
                                <input class="form-control" type="text" name="coupon_title" value="{{ $coupon->coupon_title }}">
                                @error('coupon_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="coupon_code">Code</label>
                                <input class="form-control" type="text" name="coupon_code"  value="{{ $coupon->coupon_code }}">
                                @error('coupon_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="coupon_amount">Amount</label>
                                <input class="form-control" type="text" name="coupon_amount"  value="{{ $coupon->coupon_amount }}">
                                @error('coupon_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="coupon_starting">Start Date</label>
                                <input class="form-control" type="date" name="coupon_starting" value="{{ $coupon->coupon_starting }}">
                                @error('coupon_starting')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="coupon_ending">End Date</label>
                                <input class="form-control" type="date" name="coupon_ending" value="{{ $coupon->coupon_ending }}">
                                @error('coupon_ending')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="coupon_remarks">Remarks</label>
                                <input class="form-control" type="text" name="coupon_remarks" value="{{ $coupon->coupon_remarks }}">
                                @error('coupon_remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-save font-size-16 align-middle me-2"></i> Coupon Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
