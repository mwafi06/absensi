@extends('layouts.base')

@section('content')
<style type="text/css">
	.form-group{
		margin: 0;
	}
</style>
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
				<h4 class="panel-title">Data {{$page}}</h4>
			</div>
			<div class="panel-body">
				<!-- begin table-responsive -->
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<td>No</td>
							<td>Tanggal</td>
							<td>NIP</td>
							<td>Nama</td>
							<td>Absen Masuk</td>
							<td>Absen Keluar</td>
							<td>Keterangan</td>
							<td>Status</td>
							<td>Actions</td>
						</tr>
						@foreach($karyawan as $key => $value)
						<?php
						$abs_id 	= isset($value->absen_id) ? $value->absen_id : NULL;
						$abs_in 	= isset($value->abs_in) ? $value->abs_in : NULL;
						$abs_out 	= isset($value->abs_out) ? $value->abs_out : NULL;
						$status 	= isset($value->absen_status) ? $value->absen_status : '-';
						$keterangan = isset($value->keterangan) ? $value->keterangan : '-';
						?>
						<tr absen_id="{{$value->id}}">
							<td>{{$key+1}}</td>
							<td>{{date('Y-m-d')}}</td>
							<td>{{$value->nip}}</td>
							<td>{{$value->nama}}</td>
							<td>
								@if(!is_null($abs_in))
								{{$abs_in}}
								@else
								@if ($status == 'Masuk' || $status == '-')
								<form  method="post" action="{{url('/absen/save?callback=absensi')}}">
									@csrf
									<div class="form-group">
										<div class='input-group date' timepicker>
											<input type='text' class="form-control" value="{{$abs_in}}" name="time" />
											<span class="input-group-addon">
												<span class="fa fa-clock"></span>
											</span>
										</div>
										<input type="hidden" name="type" value="Masuk">
										<input type="hidden" name="name" value="{{$value->nip}}">
									</div>
								</form>
								@else
								-
								@endif
								@endif
							</td>
							<td>
								@if(!is_null($abs_out))
								{{$abs_out}}
								@else
								@if ($status == 'Masuk' || $status == '-')
								<form  method="post" action="{{url('/absen/save?callback=absensi')}}">
									@csrf
									<div class="form-group">
										<div class='input-group date' timepicker>
											<input type='text' class="form-control" value="{{$abs_out}}" name="time" />
											<span class="input-group-addon">
												<span class="fa fa-clock"></span>
											</span>
										</div>
										<input type="hidden" name="type" value="keluar">
										<input type="hidden" name="name" value="{{$value->nip}}">
									</div>
								</form>
								@else
								-
								@endif
								@endif
							</td>
							<td>{{$keterangan}}</td>
							<td>{{$status}}</td>
							<td>
								<a href="#modal-dialog" class="btn btn-sm btn-primary m-r-2"  data-toggle="modal" karyawan-id="{{$value->id}}" update-status karyawan-ket="{{$value->keterangan}}">Update Status</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{url('/absensi/update-status')}}" id="update-status">
				<div class="modal-header">
					<h4 class="modal-title">Update Status</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label style="color: #495057" >Status</label>
						<select class="form-control" style="border: 1px solid #d3d8de;color: #495057;margin-bottom: 5px" name="status">
							<option value="Masuk">Masuk</option>
							<option value="Izin">Izin</option>
							<option value="Alpa">Alpa</option>
						</select>
					</div>
					<div class="form-group">
						<label style="color: #495057" >Keterangan</label>
						<textarea class="form-control" style="border: 1px solid #d3d8de;color: #495057" name="keterangan" placeholder="-" id="hid_karyawan_ket"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					@csrf
					<input type="hidden" name="hid_karyawan_id" value="" id="hid_karyawan_id">
					<button class="btn btn-white" data-dismiss="modal" reset>Close</button>
					<button class="btn btn-success" type="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection