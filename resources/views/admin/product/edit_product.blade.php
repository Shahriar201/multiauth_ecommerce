@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Product Section</span>
</nav>

<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Product</h6>
        <form action="{{ route('update.product.without.image', $editProduct->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name" value="{{ $editProduct->product_name }}">
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_code" value="{{ $editProduct->product_code }}">
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_quantity" value="{{ $editProduct->product_quantity }}">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount_price" value="{{ $editProduct->discount_price }}">
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Select Category" id="category_id" name="category_id" required>
                            <option label="Select Category"></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" <?php if ($category->id == $editProduct->category_id) {
                                    echo "selected";
                                }?>>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Choose country" name="subcategory_id" required>
                            @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" <?php if ($subCategory->id == $editProduct->subcategory_id) {
                                    echo "selected";
                                }?>>{{ $subCategory->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Choose country" name="brand_id" required>
                        <option label="Select Brand"></option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ (@$editProduct->brand_id == $brand->id) ? 'selected' : '' }} >{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                        <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput" value="{{ $editProduct->product_size }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                        <input class="form-control" type="text" name="product_color" id="size" data-role="tagsinput" value="{{ $editProduct->product_color }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label><br>
                        <input class="form-control" type="text" name="selling_price" placeholder="Selling price" value="{{ $editProduct->selling_price }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label><br>
                        <textarea class="form-control" id="summernote" name="product_details">
                            {{ $editProduct->product_details }}
                        </textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label><br>
                        <input class="form-control" type="text" name="video_link" placeholder="Video link" value="{{ $editProduct->video_link }}">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label><br>
                        <select name="status" class="form-control col-md-12" required>
                            <option value="">Select Status</option>
                            <option value="1" <?php if ($editProduct->status == 1) {
                                echo "selected";
                            }?>>Active</option>
                            <option value="0" <?php if ($editProduct->status == 0) {
                                echo "selected";
                            }?>>Inactive</option>
                        </select>
                    </div><!-- col-4 -->

                </div><!-- row -->
                <br><hr>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="main_slider" value="1" <?php if ($editProduct->main_slider == 1) {
                                echo "checked";
                            }?>>
                            <span>Main Slider</span>
                        </label>
                    </div><!-- col-3 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deal" value="1" {{ @$editProduct->hot_deal == 1 ? 'checked' : '' }}>
                            <span>Hot Deal</span>
                        </label>
                    </div><!-- col-3 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="best_rated" value="1" {{ @$editProduct->best_rated == 1 ? 'checked' : '' }}>
                            <span>Best Rated</span>
                        </label>
                    </div><!-- col-3 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="mid_slider" value="1" {{ @$editProduct->mid_slider == 1 ? 'checked' : '' }}>
                            <span>Mid Slider</span>
                        </label>
                    </div><!-- col-3 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_new" value="1" {{ @$editProduct->hot_new == 1 ? 'checked' : '' }}>
                            <span>Hot New</span>
                        </label>
                    </div><!-- col-3 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="trend" value="1" {{ @$editProduct->trend == 1 ? 'checked' : '' }}>
                            <span>Trend</span>
                        </label>
                    </div><!-- col-3 -->
                </div><!-- row -->
                <br>
                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">Update</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
    </div><!-- card -->
</div>
    <!-- Update Product With Image -->
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Product With Image</h6>
            <form action="{{ route('update.product.with.image', $editProduct->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" accept="image">
                            <span class="custom-file-control"></span>
                            {{-- <img src="#" alt="" id="one"> --}}
                            <input type="hidden" name="old_one" value="{{ $editProduct->image_one }}">
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ URL::to($editProduct->image_one) }}" style="width: 80px; height: 80px;" alt="" id="one">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);" accept="image">
                            <span class="custom-file-control"></span>
                            {{-- <img src="#" alt="" id="two"> --}}
                            <input type="hidden" name="old_two" value="{{ $editProduct->image_two }}">
                        </label>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ URL::to($editProduct->image_two) }}" style="width: 80px; height: 80px;" alt="" id="two">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);" accept="image">
                            <span class="custom-file-control"></span>
                            {{-- <img src="#" alt="" id="three"> --}}
                            <input type="hidden" name="old_three" value="{{ $editProduct->image_three }}">
                        </label>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ URL::to($editProduct->image_three) }}" style="width: 80px; height: 80px;" alt="" id="three">
                    </div>
                </div>
                <br>
                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">Image Update</button>
                </div><!-- form-layout-footer -->
            </form>
        </div>
    </div>

<script src="{{ asset('public/backend/lib/jquery/jquery.min.js') }}"></script>

{{-- get category wise sub-category --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = document.querySelector('#category_id').value;
            if (category_id) {
                $.ajax({
                    url: "{{ url('/admin/get/subcategory/') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

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

{{-- image two show --}}
<script type="text/javascript">
	function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

{{-- image one show --}}
<script type="text/javascript">
	function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection
