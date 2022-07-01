@extends('layouts.admin_layout')
@section('admin-content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Role</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Role</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card border border-primary">
                <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                    <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Update Role
                        For {{ $role->name }}</h5>
                    <a href="{{ route('manage.role') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                        <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Roles
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage.role.update',$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-12 my-3 d-flex">
                                <div class="row">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        @if(substr($permission->name,0,4) == "user")
                                            @if($count == 1)
                                                <hr>
                                                <div class="row-fluid">
                                                    <h5 class="text-primary">User Permissions</h5>
                                                </div>
                                                <hr>
                                            @endif
                                            <div class="col-md-2">
                                                <div class="form-check form-switch form-switch-md mb-3"
                                                     dir="ltr">
                                                    <input
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} name="permission[]"
                                                        value="{{ $permission->name }}" type="checkbox"
                                                        class="form-check-input" id="{{ $permission->name }}">
                                                    <label class="form-check-label"
                                                           for="{{ $permission->name }}">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endif


                                        @if(substr($permission->name,0,8) == "Category")
                                            @if($count == 6)
                                                <hr>
                                                <div class="row-fluid">
                                                    <h5 class="text-primary">Category Permissions</h5>
                                                </div>
                                                <hr>
                                            @endif
                                            <div class="col-md-2">
                                                <div class="form-check form-switch form-switch-md mb-3"
                                                     dir="ltr">
                                                    <input
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} name="permission[]"
                                                        value="{{ $permission->name }}" type="checkbox"
                                                        class="form-check-input" id="{{ $permission->name }}">
                                                    <label class="form-check-label"
                                                           for="{{ $permission->name }}">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endif


                                        @if(substr($permission->name,0,7) == "Product")
                                            @if($count == 11)
                                                <hr>
                                                <div class="row-fluid">
                                                    <h5 class="text-primary">Product Permissions</h5>
                                                </div>
                                                <hr>
                                            @endif
                                            <div class="col-md-2">
                                                <div class="form-check form-switch form-switch-md mb-3"
                                                     dir="ltr">
                                                    <input
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} name="permission[]"
                                                        value="{{ $permission->name }}" type="checkbox"
                                                        class="form-check-input" id="{{ $permission->name }}">
                                                    <label class="form-check-label"
                                                           for="{{ $permission->name }}">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endif


                                        @if(substr($permission->name,0,5) == "Brand")
                                            @if($count == 16)
                                                <hr>
                                                <div class="row-fluid">
                                                    <h5 class="text-primary">Brand Permissions</h5>
                                                </div>
                                                <hr>
                                            @endif
                                            <div class="col-md-2">
                                                <div class="form-check form-switch form-switch-md mb-3"
                                                     dir="ltr">
                                                    <input
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} name="permission[]"
                                                        value="{{ $permission->name }}" type="checkbox"
                                                        class="form-check-input" id="{{ $permission->name }}">
                                                    <label class="form-check-label"
                                                           for="{{ $permission->name }}">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bxs-save font-size-16 align-middle me-2"></i> Role Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
