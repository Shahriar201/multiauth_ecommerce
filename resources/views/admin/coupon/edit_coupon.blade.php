@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Coupon</a>
    <span class="breadcrumb-item active">Edit Coupon</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Edit Coupon</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Coupon
            <a href="{{ route('brand') }}" class="btn btn-warning btn-sm" style="float: right;">Coupon List</a>
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
            <form method="post" action="{{ route('update.coupon', $coupon->id) }}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="coupon">Coupon</label>
                            <input type="text" class="form-control" name="coupon" aria-describedby="emailHelp" placeholder="Enter Coupon Code" value="{{ $coupon->coupon }}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="coupon">Coupon Discount (%)</label>
                            <input type="text" class="form-control" name="discount" aria-describedby="emailHelp" placeholder="Enter Coupon Discount" value="{{ $coupon->discount }}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <select name="status" class="form-control col-md-12" required>
                                <option value="">Select Status</option>
                                <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
  </div

@endsection

