@extends('layouts.base')

@section('content')

<section class="main-section">
    <!-- Add Your Content Inside -->
    <div class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">
                <a href="{{ url('/layouts/index') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
        <br>
        <br>
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
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                        data-click="panel-collapse">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <h4 class="panel-title">Data Karyawan</h4>
            </div>
            <div class="panel-body">
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>NIP</td>
                                <td>Nama</td>
                                <td>Tanggal Lahir</td>
                                <td>Asal</td>
                                <td>Alamat</td>
                                <td>No. Telp</td>
                                <td>Status</td>
                                <td>Jabatan</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <div class="pull-right">
                            <a class="btn btn-success" href="/karyawan/create" class="btn btn-primary">Add Data</a>
                            <br>
                            <br>
                        </div>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($karyawan as $datas)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$datas->nip}}</td>
                                <td>{{$datas->nama }}</td>
                                <td>{{$datas->tgl_lhr }}</td>
                                <td>{{$datas->asal }}</td>
                                <td>{{$datas->alamat }}</td>
                                <td>{{$datas->no_tlp }}</td>
                                <td>{{$datas->status }}</td>
                                <td>{{$datas->jabatan->nama_jabatan }}</td>
                                <td>
                                    <a href="/karyawan/edit/{{$datas->id }}"
                                        class="btn btn-sm btn-primary m-r-2">Edit</a>
                                </td>
                                <td>
                                    <a href="/karyawan/destroy/{{ $datas->id }}"
                                        class="btn btn-sm btn-white m-r-2">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection