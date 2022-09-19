@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Sub-Category</a>
    <span class="breadcrumb-item active">Edit Sub-Category</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Edit Sub-Category</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Sub-Category
            <a href="{{ route('subCategory') }}" class="btn btn-warning btn-sm" style="float: right;">Sub-Category List</a>
        </h6>
        <div class="table-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('update.SubCategory', $subCategory->id) }}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="subcategory_name">Sub-Category Name</label>
                            <input type="text" class="form-control" name="subcategory_name" placeholder="Enter Brand Name" value="{{ $subCategory->subcategory_name }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_id">Category Name</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($subCategory->category_id == $category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="1" {{ $subCategory->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $subCategory->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding-top: 30px;">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
  </div

@endsection

