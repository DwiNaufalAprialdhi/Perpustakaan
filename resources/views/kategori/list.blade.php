@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Kategori</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                <hr>
                <a href="/kategori-create" type="button" class="btn btn-primary btn-sm"> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show shadow rounded" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>
                                <center> Aksi </center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i=1;
                        ?>
                        @foreach($kategori as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->nama}}</td>
                            <td>
                                <center>
                                    <a href="/kategori-detail/{{$row->id}}" class="btn btn-secondary btn-sm"><i
                                            class="fas fa-pencil"></i>Detail</a>
                                    <a href="/kategori-edit/{{$row->id}}" class="btn btn-success btn-sm"><i
                                            class="fas fa-pencil"></i>Edit</a>
                                    <a href="/kategori-delete/{{$row->id}}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('yakin?');">Delete</a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
