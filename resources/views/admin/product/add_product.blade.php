@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Product Section</span>
</nav>

<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Top Label Layout</h6>
        <p class="mg-b-20 mg-sm-b-30">A form with a label on top of each form control.</p>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" placeholder="Enter product name">
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code" placeholder="Enter product code">
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_quantity" placeholder="Enter product quantity">
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Select Category" id="category_id" name="category_id">
                        <option label="Select Category"></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Choose country">

                    </select>
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Choose country">
                    <option label="Select Brand"></option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                    <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                    <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                    <input class="form-control" type="text" name="product_color" id="size" data-role="tagsinput">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                    <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label><br>
                    <input class="form-control" type="text" name="selling_price" placeholder="Selling price">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label><br>
                    <input class="form-control" type="text" id="summernote" name="product_details">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label><br>
                    <input class="form-control" type="text" name="video_link" placeholder="Video link">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label><br>
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input">
                        <span class="custom-file-control"></span>
                    </label>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="image_two">
                        <span class="custom-file-control"></span>
                    </label>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="image_three">
                        <span class="custom-file-control"></span>
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
            <br><hr>
            <div class="row">
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1"><span>Main Slider</span>
                </label>
                </div><!-- col-3 -->
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="hot_deal" value="1"><span>Hot Deal</span>
                </label>
                </div><!-- col-3 -->
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="best_rated" value="1"><span>Best Rated</span>
                </label>
                </div><!-- col-3 -->
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="mid_slider" value="1"><span>Mid Slider</span>
                </label>
                </div><!-- col-3 -->
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="hot_new" value="1"><span>Hot New</span>
                </label>
                </div><!-- col-3 -->
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="trend" value="1"><span>Trend</span>
                </label>
                </div><!-- col-3 -->
            </div><!-- row -->
            <br>
            <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Submit</button>
            </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
    </div><!-- card -->
</div

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- get category wise sub-category --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#category_id', function() {
            console.log('==============================')
            var category_id = $(this).val();
            alert(category_id);
        });
    });
</script>

@endsection
