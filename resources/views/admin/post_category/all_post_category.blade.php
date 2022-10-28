@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Post Category</a>
    <span class="breadcrumb-item active">Post Category List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Post Categoty Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Category List
            <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".create_modal">Add New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">SL.</th>
                <th class="wd-15p">Category Name English</th>
                <th class="wd-15p">Category Name Bangla</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($postCategories as $key => $postCategory)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $postCategory->category_name_en ?? '' }}</td>
                        <td>{{ $postCategory->category_name_bn ?? '' }}</td>
                        <td>
                            @if ($product->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" title="Edit" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="#" title="Delete" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No Package Found</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
  </div

@endsection
