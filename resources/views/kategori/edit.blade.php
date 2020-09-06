@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Buku</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/kategori-update" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="no_buku">Nama Kategori</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$kategori->id}}">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$kategori->nama}}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{$kategori->deskripsi}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/kategori" type="button" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
