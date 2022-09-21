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
                <select class="form-control select2" data-placeholder="Choose country">
                  <option label="Choose country"></option>
                  <option value="USA">United States of America</option>
                  <option value="UK">United Kingdom</option>
                  <option value="China">China</option>
                  <option value="Japan">Japan</option>
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
                  <option label="Choose country"></option>
                  <option value="USA">United States of America</option>
                  <option value="UK">United Kingdom</option>
                  <option value="China">China</option>
                  <option value="Japan">Japan</option>
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
                <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label><br>
                <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_one">
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
          </div><!-- row -->

          <div class="form-layout-footer">
            <button class="btn btn-info mg-r-5">Submit Form</button>
            <button class="btn btn-secondary">Cancel</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</div

@endsection
