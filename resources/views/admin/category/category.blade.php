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
            <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".bd-example-modal-lg">Add New</a>
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

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('store.category') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="category_name">Category</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Password</label>
                            <select name="status" class="form-control col-md-12" id="">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
    </div>

@endsection
