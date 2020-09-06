<?php

namespace App\Http\Controllers;

use App\Model\Buku;
use App\Model\Kategori;
use App\Model\Peminjam;
use App\Model\Transaksi;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // mengambil data dari table buku
        $buku = Buku::count();
        $kategori = Kategori::count();
        $peminjam = Peminjam::count();
        $transaksi = Transaksi::count();
        $pengguna = User::count();

        //menyimpan data untuk chart


        // mengirim data buku ke view buku
        return view('dashboard.list', compact('buku', 'peminjam', 'transaksi', 'kategori', 'pengguna'));
    }
}
