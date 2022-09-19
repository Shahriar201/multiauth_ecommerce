@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Sub-Category</a>
    <span class="breadcrumb-item active">Sub-Category List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Sub-Categoty Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title"> Sub-Category List
            <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".create_modal">Add New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">SL.</th>
                <th class="wd-15p">Sub-Category Name</th>
                <th class="wd-15p">Category Name</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subCategories as $key => $subCategory)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $subCategory->subcategory_name }}</td>
                        <td>{{ $subCategory->category_name }}</td>
                        <td>{{ $subCategory->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('edit.subCategory', $subCategory->id) }}" title="Edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('delete.SubCategory', $subCategory->id) }}" title="Delete" class="btn btn-sm btn-danger" id="delete">Delete</a>
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

    <!-- Create Modal -->
    <div class="modal fade create_modal" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="create_modal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Sub-Category</h5>
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
            <form method="post" action="{{ route('store.subCategory') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="subcategory_name">Sub Category</label>
                            <input type="text" class="form-control" name="subcategory_name" aria-describedby="emailHelp" placeholder="Enter Sub-Category Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select Sub-Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12">
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
    <!-- End Create Modal -->

@endsection
