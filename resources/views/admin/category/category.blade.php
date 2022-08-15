@extends('admin.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Category</a>
    <span class="breadcrumb-item active">Category List</span>
</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Categoty List</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">SL.</th>
              <th class="wd-15p">Category Name</th>
              <th class="wd-20p">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger</td>
              <td>Nixon</td>
              <td>System Architect</td>
            </tr>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div


@endsection
