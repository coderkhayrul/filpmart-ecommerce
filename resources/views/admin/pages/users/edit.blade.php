@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Users</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edit User </h5>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All User
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('user.update',$data->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="name">Full Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $data['name'] }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $data['email'] }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ $data['phone'] }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="role">Role</label>
                                <select class="form-select" name="role">
                                    <option disabled selected>Select Role</option>
                                    <option value="1" {{ $data['role'] == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $data['role'] == '2' ? 'selected' : '' }}>Subscriber</option>
                                    <option value="3" {{ $data['role'] == '3' ? 'selected' : '' }}>Staff</option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address">{{ $data['address'] }}</textarea>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bxs-save font-size-16 align-middle me-2"></i> User Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
