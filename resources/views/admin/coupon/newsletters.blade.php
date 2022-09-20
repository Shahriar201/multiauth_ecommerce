@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Newsletters</a>
    <span class="breadcrumb-item active">Newsletters List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Newsletters Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Newsletters List
            <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".create_modal">Add New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">SL.</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Subscribing Time</th>
                <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newsletters as $key => $newsletter)
                    <tr>
                        <td><input type="checkbox"> {{ ++$key }}</td>
                        <td>{{ $newsletter->email ?? '' }}</td>
                        <td>{{ $newsletter->created_at ?? '' }}</td>
                        <td>
                            <a href="{{ route('delete.newsletter', $newsletter->id) }}" title="Delete" class="btn btn-sm btn-danger" id="delete">Delete</a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No Package Found</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
  </div

@endsection
