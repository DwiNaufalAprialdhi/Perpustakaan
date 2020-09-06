@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Pengguna</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/pengguna-update" method="post">
                {{csrf_field()}}
                  <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$pengguna->id}}">
                        <input type="text" class="form-control" id="name" name="name" value="{{$pengguna->name}}">
                    </div>
                <div class="form-group">
                    <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$pengguna->email}}">
                </div>
                 <div class="form-group">
                    <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{$pengguna->password}}">
                </div>
                <div class="form-group">
                        <label for="akses">Akses</label>
                    <select id="akses" name="akses" class="form-control" value="{{$pengguna->akses}}">
                            <option selected>- Pilih -</option>
                            <option value="admin">admin</option>
                            <option value="petugas">petugas</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/pengguna" type="button" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
