@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Buku</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/buku-add" method="post">
                {{csrf_field()}}
                 <div class="form-group">
                    <label for="no_buku">Kode Buku</label>
                    <input type="text" class="form-control" id="no_buku" name="no_buku">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Judul</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kategori">Kategori</label>
                        <select id="kategori_id" name="kategori_id" class="form-control">
                            <option selected>- Pilih -</option>
                            @foreach($buku as $input){
                                <option value={{$input->id}}>{{($input->nama)}}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/buku" type="button" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
