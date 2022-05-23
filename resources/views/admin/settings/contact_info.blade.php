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
                    <li class="breadcrumb-item active">Contact Info</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Contact
                    Information </h5>
                <a href="{{ route('manage.social.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> Social Media</a>
            </div>
            <form action="{{ route('manage.contact.update') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="contact_phone_one">Phone 1</label>
                            <input class="form-control" type="text" name="contact_phone_one" value="{{ $data['contact_phone_one'] }}">
                            @error('contact_phone_one')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contact_phone_two">Phone 2</label>
                            <input class="form-control" type="text" name="contact_phone_two" value="{{ $data['contact_phone_two'] }}">
                            @error('contact_phone_two')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contact_email_one">Email 1</label>
                            <input class="form-control" type="email" name="contact_email_one" value="{{ $data['contact_email_one'] }}">
                            @error('contact_email_one')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contact_email_two">Email 2</label>
                            <input class="form-control" type="email" name="contact_email_two" value="{{ $data['contact_email_two'] }}">
                            @error('contact_email_two')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contact_address_one">Address 1</label>
                            <textarea class="form-control" name="contact_address_one">{{ $data['contact_address_one'] }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="contact_address_two">Address 2</label>
                            <textarea class="form-control" name="contact_address_two">{{ $data['contact_address_two'] }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-2 mt-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="bx bxs-save font-size-16 align-middle me-2"></i> Update Contact
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
