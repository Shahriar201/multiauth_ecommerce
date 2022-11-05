@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Post Section</span>
</nav>

<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Post</h6>
        <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Post Title English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="post_title_en" placeholder="Enter post title english" required>
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Post Title Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="post_title_bn" placeholder="Enter post title bangla" required>
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category English: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Select Category" id="category_id" name="post_category_id" required>
                                <option label="Select Category"></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->post_category_name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Post Details English: <span class="tx-danger">*</span></label><br>
                        <textarea class="form-control" id="summernote" name="post_details_en"></textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Post Details Bangla: <span class="tx-danger">*</span></label><br>
                        <textarea class="form-control" id="summernote" name="post_details_bn"></textarea>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" required="" accept="image">
                            <span class="custom-file-control"></span>
                            <img src="#" alt="" id="one">
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label><br>
                        <select name="status" class="form-control col-md-12" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div><!-- col-4 -->

                </div><!-- row -->
                <br>
                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">Submit</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
    </div><!-- card -->
</div>

{{-- image one show --}}
<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection
