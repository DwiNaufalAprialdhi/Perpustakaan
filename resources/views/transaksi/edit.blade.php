@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Buku</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/transaksi-update" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">No Transaksi</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$transaksi->id}}">
                        <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" value="{{$transaksi->no_transaksi}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kategori">Anggota</label>
                        {{ Form::select('peminjam_id', $peminjamCombo, $transaksi->peminjam_id, array('class' => 'form-control')) }}
                    </div>
                </div>
                   <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$transaksi->tanggal}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kategori">Buku</label>
                            {{ Form::select('buku_id', $bukuCombo, $transaksi->buku_id, array('class' => 'form-control')) }}
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"value="{{$transaksi->tanggal_pinjam}}">
                    </div>
                   <div class="form-group col-md-6">
                        <label for="nama">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo"value="{{$transaksi->tanggal_jatuh_tempo}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="created_by">Dibuat oleh</label>
                    <input type="text" class="form-control" id="created_by" name="created_by" value="{{$transaksi->created_by}}">
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/transaksi" type="button" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
