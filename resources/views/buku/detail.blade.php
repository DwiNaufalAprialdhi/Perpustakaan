@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-flex justify-content-between mb-4">
                    <h1 class="h3 text-gray-800">Detail Buku</h1>
                <hr>
                <a href="/buku" type="button" class="btn btn-primary btn-sm shadow-lg rounded"> Kembali</a>
        </div>

    <div class="card mb-5 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
        <p class="card-text">Judul : {{$buku->nama}}</p>
        <p class="card-text">Kategori : {{$buku->categories->nama}}</p>
        <p class="card-text">No Buku : {{$buku->no_buku}}</p>
        <p class="card-text">Deskripsi : {{$buku->deskripsi}}</p>
        </div>
    </div>

</div>
@endsection
