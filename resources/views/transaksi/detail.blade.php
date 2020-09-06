@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-flex justify-content-between mb-4">
                    <h1 class="h3 text-gray-800">Detail Transaksi</h1>
                <hr>
                <a href="/transaksi" type="button" class="btn btn-primary btn-sm shadow-lg rounded"> Kembali</a>
        </div>

    <div class="card mb-5 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
        <p class="card-text">No Transaksi : {{$transaksi->no_transaksi}}</p>
        <p class="card-text">Anggota : {{$transaksi->browwers->nama}}</p>
        <p class="card-text">Buku : {{$transaksi->books->nama}}</p>
        <p class="card-text">Kode Buku : {{$transaksi->books->no_buku}}</p>
        <p class="card-text">Tanggal Pinjam : {{$transaksi->tanggal_pinjam}}</p>
        <p class="card-text">Tanggal Jatuh Tempo : {{$transaksi->tanggal_jatuh_tempo}}</p>
        <p class="card-text">Denda : {{$transaksi->denda??'-'}}</p>
        <p class="card-text">Status : @if($transaksi->status == 0)Masa Peminjaman @elseif($transaksi->status == 1)Sudah Dikembalikan @else Belum Dikembalikan @endif</p>

        </div>
    </div>

</div>
@endsection
