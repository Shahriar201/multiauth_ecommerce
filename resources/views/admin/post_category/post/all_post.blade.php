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
            <a href="{{ route('add.post') }}" class="btn btn-warning btn-sm" style="float: right;">Add New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive">
            <thead>
                <tr>
                <th class="wd-5p">SL.</th>
                <th class="wd-10p">Post Title English</th>
                <th class="wd-10p">Post Title Bangla</th>
                <th class="wd-10p">Post Category</th>
                <th class="wd-10p">Post Details English</th>
                <th class="wd-10p">Post Details Bangla</th>
                <th class="wd-10p">Image</th>
                <th class="wd-10p">Status</th>
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
                        <td>
                            <img src="{{ URL::to($post->post_image) }}" style="width: 50px; height: 40px; object-fit: cover;" alt="No Image Found"/>
                        </td>
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
                    <td colspan="10" class="text-center">No Package Found</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
  </div

@endsection
