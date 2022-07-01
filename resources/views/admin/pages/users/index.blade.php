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
                        <li class="breadcrumb-item active">All User</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card border border-primary">
                <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                    <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>All Users
                    </h5>
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                        <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> Create User
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{ $data['name'] }}</td>
                                    <td>{{ $data['email'] }}</td>
                                    <td>
                                        @if ($data['phone'] == null)
                                            N/A
                                        @else
                                            {{ $data['phone'] }}
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-primary">Role</span>
                                    </td>
                                    <td>
                                        @if ($data->status == 1)
                                            <div class="badge badge-soft-success font-size-12">Active</div>
                                        @else
                                            <div class="badge badge-soft-danger font-size-12">Disabled</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                Manage <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li>
                                                    <a href="{{ route('user.show',$data['slug']) }}"
                                                    class="dropdown-item"><i
                                                            class="bx bx-show-alt label-icon"></i> Show</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.edit',$data['slug']) }}"
                                                    class="dropdown-item"><i
                                                            class=" bx bx-edit-alt label-icon"></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.softdelete',$data['slug']) }}"
                                                    class="dropdown-item"><i
                                                            class=" bx bxs-trash-alt label-icon"></i> Delete</a>
                                                </li>
                                                <li class="">
                                                    <a href="#" class="dropdown-item bg-danger text-light"><i
                                                            class="bx bx-user-x label-icon"></i> Suspend</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-css')
    <!-- DataTables -->
    <link href="{{ asset('backend') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('backend') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
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
