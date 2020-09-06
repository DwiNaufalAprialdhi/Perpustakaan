@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-flex justify-content-between mb-4">
                    <h1 class="h3 text-gray-800">Detail Buku</h1>
                <hr>
                <a href="/pengguna" type="button" class="btn btn-primary btn-sm shadow-lg rounded"> Kembali</a>
        </div>

    <div class="card mb-5 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
        <p class="card-text">Nama Kategori : {{$pengguna->name}}</p>
        <p class="card-text">Email : {{$pengguna->email}}</p>
        <p class="card-text">Password (Bcrypt) : {{$pengguna->password}}</p>
        <p class="card-text">Hak Akses sebagai : {{$pengguna->akses}}</p>
        </div>
    </div>

</div>
@endsection
