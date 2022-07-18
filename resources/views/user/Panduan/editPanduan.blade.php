@extends('layouts.base')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{!! asset('bower_components/select2/dist/css/select2.min.css') !!}">
<!-- Theme style -->
<link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
@endsection

@section('breadcrumb')
<h1>
    Panduan Kesehatan
    <small>Untuk Masyarakat</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Master</a></li>
    <li class="active">Panduan</li>
</ol>
@endsection

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Edit Data Panduan</div>
	<div class="panel-body">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					@foreach($data as $datas)
					<form class="form-horizontal" method="post" action="{{ route('updatePanduan', $datas->id_panduan) }}">
						@csrf
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="judul">Judul</label>
								<div class="input-group col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="bi bi-chat-fill"></i></i></span>
										<input type="text" class="form-control" name="judul" value="{{ $datas->judul }}" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="kategori">Kategori</label>
								<div class="input-group col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="bi bi-grid-fill"></i></span>
										<input type="text" class="form-control" name="kategori" value="{{ $datas->kategori }}" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="isi">Isi</label>
								<div class="input-group col-md-8">
									<div class="input-group">
										<span class="input-group-addon"><i class="bi bi-list"></i></span>
										<textarea class="form-control" rows="4" name="isi" required>{{ $datas->isi }}</textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label" for="name"></label>
								<div class="input-group col-md-8">
									<button type="submit" class="btn btn-primary" style="margin-right: 6px;">Simpan</button>
									<a href="{{ route('viewPanduan') }}" class="btn btn-danger">Batal</a>
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
<!-- Select2 -->
<script src="{!! asset('bower_components/select2/dist/js/select2.full.min.js') !!}"></script>
<script>
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()
	})
</script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputgambar").change(function () {
        readURL(this);
    });
</script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#showgambar1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputgambar1").change(function () {
        readURL(this);
    });
</script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#showgambar2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputgambar2").change(function () {
        readURL(this);
    });
</script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#showgambar3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputgambar3").change(function () {
        readURL(this);
    });
</script>
@endsection