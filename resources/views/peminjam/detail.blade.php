@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-flex justify-content-between mb-4">
                    <h1 class="h3 text-gray-800">Detail Anggota</h1>
                <hr>
                <a href="/peminjam" type="button" class="btn btn-primary btn-sm shadow-lg rounded"> Kembali</a>
        </div>

    <div class="card mb-5 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
        <p class="card-text">Nama : {{$peminjam->nama}}</p>
        <p class="card-text">Email : {{$peminjam->email}}</p>
        <p class="card-text">Telepon : {{$peminjam->no_telp}}</p>
        <p class="card-text">Alamat : {{$peminjam->alamat}}</p>
        {{-- <p class="card-text">Tanngal Pinjam : {{$peminjam->tanggal_pinjam}}</p> --}}
        {{-- <p class="card-text">Tanggal Jatuh Tempo : {{$peminjam->tanggal_jatuh_tempo}}</p> --}}
        {{-- <p class="card-text">Status : @if($peminjam->status == 0)Masa Peminjaman @elseif($peminjam->status == 1)Sudah Dikembalikan @else Belum Dikembalikan @endif</p> --}}
        </div>
    </div>

</div>
@endsection
