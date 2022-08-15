@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Category</a>
    <span class="breadcrumb-item active">Category List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Categoty Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Category List
            <a href="#" class="btn btn-warning" style="float: right">Add New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">SL.</th>
                <th class="wd-15p">Category Name</th>
                <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>
                    <a href="#" title="Edit" class="btn btn-sm btn-info">Edit</a>
                    <a href="#" title="Delete" class="btn btn-sm btn-danger" id="delete">Delete</a>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
  </div


@endsection
