@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Buku</h1>
    <div class="card mb-4 shadow-lg rounded" style="width: 100%;">
        <div class="card-body">
            <form action="/buku-update" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Judul</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$buku->id}}">

                    <input type="text" class="form-control" id="nama" name="nama" value="{{$buku->nama}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kategori">Kategori</label>
                   {{ Form::select('kategori_id', $kategoriCombo, $buku->kategori_id, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_buku">Kode Buku</label>
                    <input type="text" class="form-control" id="no_buku" name="no_buku" value="{{$buku->no_buku}}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{$buku->deskripsi}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/buku" type="button" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
