@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Post</a>
    <span class="breadcrumb-item active">Post List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Post Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post List
            <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".create_modal">Add New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">SL.</th>
                <th class="wd-15p">Post Title English</th>
                <th class="wd-15p">Post Title Bangla</th>
                <th class="wd-15p">Post Category</th>
                <th class="wd-15p">Post Details English</th>
                <th class="wd-15p">Post Details Bangla</th>
                <th class="wd-15p">Image</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $key => $post)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $post->post_category_id ?? '' }}</td>
                        <td>{{ $post->post_title_en ?? '' }}</td>
                        <td>{{ $post->post_title_bn ?? '' }}</td>
                        <td>{{ $post->post_details_en ?? '' }}</td>
                        <td>{{ $post->post_details_bn ?? '' }}</td>
                        <td>{{ $post->post_image ?? '' }}</td>
                        <td>
                            @if ($post->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" title="Edit" data-toggle="modal" data-target='.update_modal' class="btn btn-sm btn-info"
                                {{-- data-id="{{ $post->id }}"
                                data-nameen="{{ $post->post_category_name_en }}"
                                data-namebn="{{ $post->post_category_name_bn }}"
                                data-status="{{ $post->status }}" --}}
                            ><i class="fa fa-edit"></i></a>
                            <a href="{{ route('post.category.delete', $post->id) }}" title="Delete" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">No Package Found</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
  </div

    <!-- Create Modal -->
    {{-- <div class="modal fade create_modal" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="create_modal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Post Category Create</h5>
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
            <form method="post" action="{{ route('post.category.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="category_name">Category Name English</label>
                            <input type="text" class="form-control" name="post_category_name_en" aria-describedby="emailHelp" placeholder="Enter Category Name English" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="category_name">Category Name Bangla</label>
                            <input type="text" class="form-control" name="post_category_name_bn" aria-describedby="emailHelp" placeholder="Enter Category Name Bangla" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12" required>
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
    </div> --}}
    <!-- End Create Modal -->

    <!-- Update Modal -->
    {{-- <div class="modal fade update_modal" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Post Category Update</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('post.category.update', $postCategory->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" class="id" name="id" value="">
                        <div class="form-group col-md-12">
                            <label for="category_name">Category Name English</label>
                            <input type="text" class="form-control post_category_name_en" name="post_category_name_en" aria-describedby="emailHelp" placeholder="Enter Category Name English" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="category_name">Category Name Bangla</label>
                            <input type="text" class="form-control post_category_name_bn" name="post_category_name_bn" aria-describedby="emailHelp" placeholder="Enter Category Name Bangla" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12 status" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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

    {{-- <script>
        $(document).ready(function() {
            $('#update_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)

                var id = button.data('id');
                var categoryNameEn = button.data('nameen');
                var categoryNameBn = button.data('namebn');
                var status = button.data('status');

                var modal = $(this);

                modal.find('.modal-body .id').val(id);
                modal.find('.modal-body .post_category_name_en').val(categoryNameEn);
                modal.find('.modal-body .post_category_name_bn').val(categoryNameBn);
                modal.find('.modal-body .status').val(status);
            });
        });
    </script> --}}

@endsection
