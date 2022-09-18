@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Brand</a>
    <span class="breadcrumb-item active">Edit Brand</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Edit Brand</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Brand
            <a href="{{ route('brand') }}" class="btn btn-warning btn-sm" style="float: right;">Brand List</a>
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
            <form method="post" action="{{ route('update.brand', $brand->id) }}" enctype="multipart/form-data">
                @csrf
                {{-- <div class="modal-body"> --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="brand_name">Brand</label>
                            <input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp" placeholder="Enter Brand Name" value="{{ $brand->brand_name }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12" required>
                                <option value="">Select Status</option>
                                <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="brand_logo">Brand Logo</label>
                            <input type="file" name="brand_logo" class="form-control" id="image">
                        </div>
                        <div class="form-group col-md-6">
                            <img id="showImage" src="{{ URL::to($brand->brand_logo) }}" style="width: 100px; height: 110px; border: 1px solid #000; object-fit: cover;">
                            <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
  </div

@endsection

