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
                <th class="wd-15p" style="width: 10px;">SL.</th>
                {{-- <th class="wd-15p" style="width: 10px;">Product Id</th> --}}
                <th class="wd-15p" style="width: 20px;">Product Name</th>
                <th class="wd-15p" style="width: 10px;">Image</th>
                <th class="wd-15p" style="width: 10px;">Category</th>
                <th class="wd-15p" style="width: 10px;">Brand</th>
                <th class="wd-15p" style="width: 10px;">Quantity</th>
                <th class="wd-15p" style="width: 5px;">Status</th>
                <th class="wd-20p" style="width: 17%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        {{-- <td>{{ $product->id ?? '' }}</td> --}}
                        <td>{{ $product->product_name ?? '' }}</td>
                        <td>
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
                            <a href="#" title="Edit" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="{{ URL::to('admin/delete/product/'.$product->id) }}" title="Delete" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                            <a href="#" title="View" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                            @if ($product->status == 1)
                                <a href="{{ URL::to('admin/inactive/product/'.$product->id) }}" title="Inactive" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></a>
                            @else
                                <a href="{{ URL::to('admin/active/product/'.$product->id) }}" title="Active" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i></a>
                            @endif
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
