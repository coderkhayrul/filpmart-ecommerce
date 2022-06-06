@extends('layouts.admin_layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Banner</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Banner</a></li>
                    <li class="breadcrumb-item active">All Banner</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>All Category </h5>
                <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> Create Category
                </a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Banner</th>
                                <th>Name</th>
                                <th>Parent Category</th>
                                <th>Order Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $data)
                            <tr>
                                <td class="text-center">
                                        <img id="category_icon" style="width:50px"
                                        src="{{ asset('backend/uploads/category/icons/'.$data['pro_cat_icon']) }}"
                                        alt="Category_Banner icon">
                                </td>
                                <td class="text-center">
                                    <img id="category_image" style="width:50px"
                                        src="{{ asset('backend/uploads/category/'.$data['pro_cat_image']) }}"
                                        alt="category_image">
                                </td>
                                <td>{{ $data['pro_cat_name'] }}</td>
                                <td>{{ $data['pro_cat_parent'] }}</td>
                                <td>{{ $data['pro_cat_order'] }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Manage <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li>
                                                <a href="{{ route('category.edit',$data['pro_cat_slug']) }}"
                                                    class="dropdown-item"><i class=" bx bx-edit-alt label-icon"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm{{ $data['pro_cat_slug'] }}"><i class=" bx bxs-trash-alt label-icon"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                                {{-- Delete Modal --}}
                                <div class="modal fade bs-example-modal-sm{{ $data['pro_cat_slug'] }}" tabindex="-1" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mySmallModalLabel">Delete Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Are you sure to delete this?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('category.softdelete',$data['pro_cat_slug']) }}" class="btn btn-primary">Delete</a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div
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
