@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kategori</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/kategori-add" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>

            </form>
        </div>
    </div>
</div>
@endsection
