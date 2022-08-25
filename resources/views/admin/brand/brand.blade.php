@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Brand</a>
    <span class="breadcrumb-item active">Brand List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Brand Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand List
            <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".create_modal">Add New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">SL.</th>
                <th class="wd-15p">Brand Name</th>
                <th class="wd-15p">Brand Logo</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $key => $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $brands->brands_name ?? '' }}</td>
                        <td>{{ $brands->brands_name ?? '' }}</td>
                        <td>{{ $brands->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="#" title="Edit" data-toggle="modal" data-target='.update_modal' class="btn btn-sm btn-info"
                                data-id="{{ $brands->id }}"
                                data-name="{{ $brands->brands_name }}"
                                data-status="{{ $brands->status }}"
                            >Edit</a>
                            <a href="{{ route('delete.brands', $brands->id) }}" title="Delete" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
              <h5 class="modal-title" id="exampleModalLongTitle">Create Brand</h5>
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
            <form method="post" action="{{ route('store.brand') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="brand_name">Brand</label>
                            <input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp" placeholder="Enter Brand Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="brand_logo">Brand Logo</label>
                            <input type="file" class="form-control" name="brand_logo" aria-describedby="emailHelp" placeholder="Select Brand Logo">
                        </div>
                        <div class="form-group col-md-6">
                            <img id="showImage" src="" style="width: 150px; height: 160px; border: 1px solid #000; object-fit: cover;">
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

    <!-- Update Modal -->
    <div class="modal fade update_modal" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Brand</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('update.brand') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" class="id" name="id" value="">
                        <div class="form-group col-md-12">
                            <label for="brand_name">Brand</label>
                            <input type="text" class="form-control brand_name" id="brand_name" name="brand_name" aria-describedby="emailHelp" placeholder="Enter Brand Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12 status" id="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="brand_name">Brand Logo</label>
                            <input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp" placeholder="Enter Brand Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    <!-- End Update Modal -->

    <script>
        $(document).ready(function() {
            $('#update_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)

                var id = button.data('id');
                var categoryName = button.data('name');
                var status = button.data('status');

                var modal = $(this);

                modal.find('.modal-body .id').val(id);
                modal.find('.modal-body .category_name').val(categoryName);
                modal.find('.modal-body .status').val(status);
            });
        });
    </script>

@endsection
