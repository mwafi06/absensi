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
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
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
                    <div class="pull-left">
                        <form class="form-inline" action="{{url('karyawan/detail')}}" method="GET">
                            <div class="form-group m-r-10">
                                <select name="bulan" class="form-control">
                                    <option selected="selected">Bulan</option>
                                    <?php
                                    $month=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                    for($m=0; $m<count($month); $m+=1){
                                        echo"<option value=".($m+1)."> $month[$m] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group m-r-10">
                                <select class="form-control" name="tahun">
                                    <option selected="selected">Tahun</option>
                                    <?php
                                        for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                            echo"<option value='$i'> $i </option>";
                                        }
                                    ?>   
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
                        </form>
                        <br>
                        <br>
                        <form class="form-inline" action="{{url('karyawan/export')}}" enctype="multipart/form-data">
                            <input type="hidden" value="{{isset(request()->bulan) ? request()->bulan : ''}}" name="bulan">
                            <input type="hidden" value="{{isset(request()->tahun) ? request()->tahun : ''}}" name="tahun">                            
                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Export</button>
                        </form>
                        <br>
                        <br>
                    </div>
                    @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                    @endif
                    @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                    @endif

                    @if(count($data_absensi) > 0)
                    <table class="table table-hover">
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>NIP</td>
                            <td>Nama</td>
                            <td>Absen Masuk</td>
                            <td>Absen Keluar</td>
                            <td>Keterangan</td>
                            <td>status</td>
                        </tr>
                        @foreach($data_absensi as $key => $value)
                        <?php
                        $abs_id     = isset($value->absen_id) ? $value->absen_id : NULL;
                        $abs_in     = isset($value->abs_in) ? $value->abs_in : NULL;
                        $abs_out    = isset($value->abs_out) ? $value->abs_out : NULL;
                        $status     = isset($value->absen_status) ? $value->absen_status : '-';
                        $keterangan = isset($value->keterangan) ? $value->keterangan : '-';
                        ?>
                        <tr absen_id="{{$value->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$value->absen_tgl}}</td>
                            <td>{{$value->nip}}</td>
                            <td>{{$value->nama}}</td>
                            <td>
                                @if(!is_null($abs_in))
                                {{$abs_in}}
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if(!is_null($abs_out))
                                {{$abs_out}}
                                @else
                                -
                                @endif
                            </td>
                            <td>{{$keterangan}}</td>
                            <td>{{$status}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection