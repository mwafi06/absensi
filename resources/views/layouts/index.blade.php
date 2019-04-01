@extends('layouts.base')
@section('content')
	
<!-- begin #page-loader -->
<div id="page-loader" class="fade show">
  <span class="spinner"></span>
</div>
<!-- end #page-loader -->
<!-- begin #content -->
<div id="content" class="content">
  <!-- begin breadcrumb -->
  <ol class="breadcrumb pull-right">
    <li class="breadcrumb-item">
      <a href="/layouts/index">Home</a>
    </li>
  <li class="breadcrumb-item active">{{$page}}</li>
  </ol>
  <br>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
      <!-- begin col-3 -->
      <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-red">
          <div class="stats-icon">
            <i class="fa fa-users"></i>
          </div>
          <div class="stats-info">
            <h4>Data Karyawan</h4>
            <p>{{$data_count}}</p>
          </div>
          <div class="stats-link">
            <a href="{{ $data_count > 0 ? url('/karyawan/form') : '/karyawan/form'}}">View Detail 
              <i class="fa fa-arrow-alt-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- end col-3 -->
    </div>
    <!-- end row -->
    <!-- begin scroll to top btn -->
    <!-- end scroll to top btn -->
  </div>
  <!-- end page container -->
	@endsection
	
  <!-- ================== BEGIN BASE JS ================== -->
	

