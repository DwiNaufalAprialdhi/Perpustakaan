@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                <hr>
                <a href="/transaksi-create" type="button" class="btn btn-primary btn-sm"> Tambah</a>
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
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>
                                <center> Aksi </center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i=1;
                        ?>
                        @foreach($transaksi as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{($row->browwers->nama)??'-'}}</td>
                            <td>{{($row->books->nama)??'-'}}</td>
                            <td>{{($row->tanggal_pinjam)??'-'}}</td>
                            <td>{{($row->tanggal_jatuh_tempo)??'-'}}</td>
                            <td>{{($row->denda)??'-'}}</td>
                            <td> @if($row->status == 0)Masa Peminjaman @elseif($row->status == 1)Sudah Dikembalikan @else Belum Dikembalikan @endif</td>
                            <td>
                                <center>
                                    <a href="/transaksi-detail/{{$row->id}}" class="btn btn-secondary btn-sm"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="/transaksi-edit/{{$row->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="/transaksi-delete/{{$row->id}}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('yakin?');"><i class="fa fa-trash"></i></a>
                                    @if($row->status == 0)
                                    <a href="/transaksi-approve/{{$row->id}}" class="btn btn-warning btn-sm"
                                        onclick="return confirm('yakin?');"><i class="fa fa-check" aria-hidden="true"></i> Kembalikan Buku</a>
                                    @endif
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
