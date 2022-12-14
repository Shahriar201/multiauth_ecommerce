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
                @forelse ($brands as $key => $brand)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $brand->brand_name ?? '' }}</td>
                        <td>
                            {{-- <img style="width: 80px; height: 60px; object-fit: cover;" src="{{ (!empty($brand->brand_logo)) ? url('public/uploads/category/brand_logo/'.$brand->brand_logo):url('uploads/no_image.jpg') }}" alt="Brand Logo"> --}}
                            <img src="{{ URL::to($brand->brand_logo) }}" style="width: 80px; height: 60px; object-fit: cover;"/>
                        </td>
                        <td>{{ $brand->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ URL::to('admin/edit/brand/'.$brand->id) }}" title="Edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('delete.brand', $brand->id) }}" title="Delete" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
            <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="brand_name">Brand</label>
                            <input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp" placeholder="Enter Brand Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="brand_logo">Brand Logo</label>
                            <input type="file" class="form-control" name="brand_logo" id="image" aria-describedby="emailHelp" placeholder="Select Brand Logo">
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <img id="showImage" src="" style="width: 100px; height: 110px; border: 1px solid #000; object-fit: cover;">
                        </div> --}}
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
    {{-- <div class="modal fade update_modal" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
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
                        <div class="form-group col-md-12">
                            <label for="brand_name">Brand</label>
                            <input type="text" class="form-control brand_name" name="brand_name" aria-describedby="emailHelp" placeholder="Enter Brand Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12 status" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="brand_logo">Brand Logo</label>
                            <input type="file" class="form-control brand_logo" name="brand_logo" id="image" aria-describedby="emailHelp" placeholder="Select Brand Logo">
                        </div>
                        <div class="form-group col-md-6">
                            <img id="showImage" src="" style="width: 100px; height: 110px; border: 1px solid #000; object-fit: cover;">
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
    </div> --}}
    <!-- End Update Modal -->

    <script>
        $(document).ready(function() {
            $('#update_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)

                var id = button.data('id');
                var brandName = button.data('name');
                var brandLogo = button.data('logo');
                var status = button.data('status');

                var modal = $(this);

                modal.find('.modal-body .id').val(id);
                modal.find('.modal-body .brand_name').val(brandName);
                modal.find('.modal-body .brand_logo').val(brandLogo);
                modal.find('.modal-body .status').val(status);
            });
        });
    </script>

@endsection
