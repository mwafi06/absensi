		
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
      <li class="nav-profile">
        <a href="javascript:;" data-toggle="nav-profile">
          <div class="image">
            <img src="{{ asset('assets/img/user/user-13.jpg') }}" alt="" />
          </div>
          <div class="info">
            <b class="caret pull-right"></b>
								{{Session::get('name')}}		
          </div>
        </a>
      </li>
      <li>
        <ul class="nav nav-profile">
          <li>
            <a href="javascript:;">
              <i class="fa fa-cog"></i> Settings
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-pencil-alt"></i> Send Feedback
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-question-circle"></i> Helps
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- end sidebar user -->
    <!-- begin sidebar nav -->
    <ul class="nav">
      <li class="nav-header">Navigation</li>
      <li class="has-sub">
        <a href="javascript:;">
          <b class="caret"></b>
          <i class="fa fa-th-large"></i>
          <span>Dashboard</span>
        </a>
        <ul class="sub-menu">
          <li class="{{ (request()->is('/index')) ? 'active' : '' }}">
            <a href="{{ url('/index') }}">Dashboard</a>
          </li>
        </ul>
      </li>
      <li class="has-sub">
        <a href="javascript:;">
          <b class="caret"></b>
          <i class="fa fa-table"></i>
          <span>Form</span>
        </a>
        <ul class="sub-menu">
        <li class="{{ (request()->is('/karyawan/form')) ? 'active' : '' }}">
            <a href="{{ url('/karyawan/form') }}">Data Karyawan</a>
        </li>
        <li class="{{ (request()->is('/absensi/dataabsensi')) ? 'active' : '' }}">
            <a href="{{ url('/absensi/dataabsensi') }}">Data Absensi</a>
        </li>
        </ul>
      </li>
      <!-- begin sidebar minify button -->
      <li>
        <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
          <i class="fa fa-angle-double-left"></i>
        </a>
      </li>
      <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
  </div>
  <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
