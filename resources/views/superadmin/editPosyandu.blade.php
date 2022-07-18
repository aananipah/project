@extends('layouts.base')

@section('css')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{!! asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}">
@endsection

@section('breadcrumb')
<h1>
    Tambah Posyandu
    <small>Posyandu</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Master</a></li>
    <li class="active">Posyandu</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Edit Posyandu</div>
	<div class="panel-body">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					@foreach($data as $datas)
					<form class="form-horizontal" method="post" action="{{ route('ibu.update', $datas->id) }}">
						@csrf
						<input name="_method" type="hidden" value="PATCH" />
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="nama_posyandu">Nama Posyandu</label>
								<div class="input-group col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-venus"></i></span>
										<input type="text" class="form-control" placeholder="Nama Posyandu" name="nama_posyandu" value="{{ $datas->nama_ibu }}" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="no_telp">No Telepon</label>
								<div class="input-group col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-mars"></i></span>
										<input type="number" class="form-control" placeholder="Nama Suami" name="no_telp" value="{{ $datas->no_telp }}" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group form-inline">
							<div class="row">
								<label class="col-md-4 control-label" for="alamat">Alamat</label>
								<div class="input-group col-md-8">
									<div class="input-group" style="padding-right: 6px;">
										<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
										<input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $datas->alamat }}" required>
									</div>
									<div class="input-group col-xs-2" style="padding-right: 6px;">
										<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
										<input type="number" class="form-control" placeholder="Rt" name="rt" value="{{ $datas->rt }}" required>
									</div>
									<div class="input-group col-xs-2">
										<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
										<input type="number" class="form-control" placeholder="Rw" name="rw" value="{{ $datas->rw }}" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group form-inline">
							<div class="row">
								<label class="col-md-4 control-label" for="alamat2"></label>
								<div class="input-group col-md-8">
									<div class="input-group" style="padding-right: 6px;">
										<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
										<input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan" value="{{ $datas->kelurahan }}" required>
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
										<input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" value="{{ $datas->kecamatan }}" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="no_telp">Nomor Telpon</label>
								<div class="input-group col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
										<input type="number" class="form-control" placeholder="Nomor Telpon" name="no_telp" value="{{ $datas->no_telp }}">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="name"></label>
								<div class="input-group col-md-8">
									<button type="submit" class="btn btn-primary" style="margin-right: 6px;">Update</button>
									<a href="{{ route('ibu.index') }}" class="btn btn-danger">Batal</a>
								</div>
							</div>
						</div>
					</form>
					@endforeach
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('java')
<!-- bootstrap datepicker -->
<script src="{!! asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>
<!-- Page script -->
<script>
	$(function () {
		// Date Picker
		$('#datepicker').datepicker({
			format: 'yyyy/mm/dd',
			autoclose: true
		})
	})
</script>
@endsection