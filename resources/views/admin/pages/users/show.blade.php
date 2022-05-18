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
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Users  Information</h5>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All User
                </a>
            </div>
            <div class="card-body">
                <div class="p-4 border rounded">
                    <div class="table-responsive">
                        <table class="table mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Name :</th>
                                    <td>{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td>{{ $data['email'] }}</td>
                                </tr>
                                <tr>
                                    <th>Phone :</th>
                                    <td>{{ $data['phone'] }}</td>
                                </tr>
                                <tr>
                                    <th>Role :</th>
                                    <td>{{ $data['role'] }}</td>
                                </tr>
                                <tr>
                                    <th>Status :</th>
                                    <td>
                                        @if ($data->status == 1)
                                        <div class="badge badge-soft-success font-size-12">Active</div>
                                        @else
                                        <div class="badge badge-soft-danger font-size-12">Disabled</div>
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <th>Address :</th>
                                    <td>{{ $data['address'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
