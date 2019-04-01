@extends('layouts.base')

@section('content')

<section class="main-section">
  <!-- Add Your Content Inside -->
  <div class="content">
    {{-- <ol class="breadcrumb pull-right">
      <li class="breadcrumb-item">
        <a href="{{ url('/layouts/index') }}">Home</a>
      </li>
      <li class="breadcrumb-item active"></li>
    </ol>
    <br>
      <br> --}}
 <!-- Remove This Before You Start -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
          <!-- begin panel-heading -->
          <div class="panel-heading">
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
                <i class="fa fa-expand"></i>
              </a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
                <i class="fa fa-redo"></i>
              </a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
                <i class="fa fa-minus"></i>
              </a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
                <i class="fa fa-times"></i>
              </a>
            </div>
            <h4 class="panel-title">Tambah Data</h4>
          </div>
           <div class="panel-body">
                 <form method="post" action="/karyawan/store">
          <div class="form-group">
              @csrf
              <label for="nip">NIP</label>
              <input type="number" class="form-control" name="nip"/>
          </div>
          <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama"/>
          </div>
          <div class="form-group">
              <label for="tgl_lhr">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tgl_lhr"/>
          </div>
          <div class="form-group">
              <label for="asal">Asal</label>
              <input type="text" class="form-control" name="asal"/>
          </div>
          <div class="form-group">
             <label for="j_kel">Jenis Kelamin :</label><br>
            <div class="radio radio-css radio-inline">
              <input type="radio" id="Radio1" name="j_kel" value="Laki-Laki" />
               <label for="Radio1">Laki-Laki</label>
            </div>
            <div class="radio radio-css radio-inline">
              <input type="radio" id="Radio2" name="j_kel" value="Perempuan" />
               <label for="Radio2">Perempuan</label>
            </div>
          </div>
          <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat"/>
          </div>
          <div class="form-group">
              <label for="no_tlp">No. Telp</label>
              <input type="number" class="form-control" name="no_tlp"/>
          </div>
          <div class="form-group">
              <label for="status">Status</label>
              <input type="text" class="form-control" name="status"/>
          </div>
          <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" name="jabatan"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Data</button>
      </form>
  </div>
</div>
</section>
@endsection