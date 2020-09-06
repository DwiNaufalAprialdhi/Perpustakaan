@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Anggota</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/peminjam-update" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$peminjam->id}}">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$peminjam->nama}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$peminjam->email}}">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="nama">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{$peminjam->no_telp}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$peminjam->alamat}}">
                    </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/peminjam" type="button" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
