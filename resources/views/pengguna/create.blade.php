@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Pengguna</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/pengguna-add" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                <div class="form-group">
                    <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                </div>
                 <div class="form-group">
                    <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                        <label for="akses">Akses</label>
                    <select id="akses" name="akses" class="form-control">
                            <option selected>- Pilih -</option>
                            <option value="admin">admin</option>
                            <option value="petugas">petugas</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary">Tambah</button>

            </form>
        </div>
    </div>
</div>
@endsection
