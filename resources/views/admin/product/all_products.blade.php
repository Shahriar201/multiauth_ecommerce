@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Product</a>
    <span class="breadcrumb-item active">Product List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Product Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Product List</h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">SL.</th>
                <th class="wd-15p">Product Id</th>
                <th class="wd-15p">Product Name</th>
                <th class="wd-15p">Image</th>
                <th class="wd-15p">Category</th>
                <th class="wd-15p">Brand</th>
                <th class="wd-15p">Quantity</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product->id ?? '' }}</td>
                        <td>{{ $product->product_name ?? '' }}</td>
                        <td>
                            {{-- <img style="width: 80px; height: 60px; object-fit: cover;" src="{{ (!empty($brand->brand_logo)) ? url('public/uploads/category/brand_logo/'.$brand->brand_logo):url('uploads/no_image.jpg') }}" alt="Brand Logo"> --}}
                            <img src="{{ URL::to($product->image_one) }}" style="width: 50px; height: 40px; object-fit: cover;"/>
                        </td>
                        <td>{{ $product->category_name ?? '' }}</td>
                        <td>{{ $product->brand_name ?? '' }}</td>
                        <td>{{ $product->product_quantity ?? '' }}</td>
                        <td>
                            @if ($product->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" title="Edit" class="btn btn-sm btn-info mb-1">Edit</a>
                            <a href="#" title="View" class="btn btn-sm btn-warning mb-1">View</a>
                            <a href="#" title="Delete" class="btn btn-sm btn-danger mb-1" id="delete">Delete</a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No Package Found</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
  </div
@endsection
