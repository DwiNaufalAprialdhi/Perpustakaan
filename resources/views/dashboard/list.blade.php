@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <p>Selamat datang " {{ Auth::user()->name }} " di <span class="badge badge-primary">Perpustakaan Apps</span> sebagai  " {{ Auth::user()->akses }} "</p>
    <hr>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="/buku">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$buku ?? ''}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
         {{-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <a href="/kategori">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Kategori Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kategori}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div> --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <a href="/peminjam">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Anggota
                            </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$peminjam}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <a href="/transaksi">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Transaksi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transaksi}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-retweet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
           <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <a href="/transaksi">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengguna
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pengguna}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-xl-12 col-lg-5" id="chartTotal"></div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartTotal', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Keseluruhan Data'
    },
    xAxis: {
        categories: [
            'Buku',
            'Anggota',
            'Transaksi',
            'Pengguna'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total data-data'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Perpustakaan',
        data: [49.9, 71.5, 106.4, 129.2,]

    }]
});

    </script>
@endsection
