@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Anggota</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/peminjam-add" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="nama">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    {{-- <div class="form-group col-md-6">
                        <label for="nama">status</label>
                          <select id="status" name="status" class="form-control">
                            <option selected>- Pilih -</option>
                            <option value="0"> Belum Dikembalikan</option>
                            <option value="1"> Sudah Dikembalikan</option>
                        </select>
                    </div> --}}
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/peminjam" type="button" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
