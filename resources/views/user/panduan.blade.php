@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{!! asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
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

@include('notification')


<div class="container-fluid">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Panduan Kesehatan</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{ url('storePanduan') }}">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul : </label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori : </label>
                    <input type="text" class="form-control" name="kategori">
                </div>
                <div class="form-group">
                    <label for="isi">Isi : </label>
                    <textarea name="isi" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
                </div>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <!-- /.col -->
    <div class="container-fluid">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Panduan Kesehatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Judul</th>
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Isi</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->judul }}</td>
                            <td>{{ $datas->kategori }}</td>
                            <td>{{ $datas->isi }}</td>
                            <td>
                                <form action="3', $datas->id_Panduan) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="btn-group">
                                        <a href="#" class=" btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                        <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="Hapus"><span class="glyphicon glyphicon-trash"></span></button>
                                    </div>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('java')
<!-- DataTables -->
<script src="{!! asset('bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript">
    $(function () {
        $('#example1').DataTable()
    })
</script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endsection