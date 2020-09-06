<?php

namespace App\Http\Controllers;

use App\Model\Buku;
use App\Model\Peminjam;
use App\Model\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // mengambil data dari table transaksi
        $transaksi = Transaksi::all();

        // mengirim data transaksi ke view transaksi
        return view('transaksi.list', compact('transaksi'));
    }

    public function create()
    {
        $buku = Buku::all();
        $peminjam = Peminjam::all();
        // memanggil view create
        return view('transaksi.create', compact('buku', 'peminjam'));
    }

    public function add(Request $request)
    {
        // dd($request);
        // untuk validasi form
        $this->validate($request, [
            'no_transaksi' => 'required',
            'tanggal' => 'required',
            'peminjam_id' => 'required',
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'created_by' => 'required',
        ]);
        // insert data ke table transaksi
        $transaksi = new Transaksi();
        // dd($buku);
        $transaksi->no_transaksi = $request->no_transaksi;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->peminjam_id = $request->peminjam_id;
        $transaksi->buku_id = $request->buku_id;
        $transaksi->status = 0;
        $transaksi->tanggal_pinjam = $request->tanggal_pinjam;
        $transaksi->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
        $transaksi->created_by = $request->created_by;
        $transaksi->save();
        // alihkan halaman tambah buku ke halaman buku
        return redirect('/transaksi')->with('status', 'Data Transaksi Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        // mengambil data transaksi berdasarkan id yang dipilih
        $transaksi = Transaksi::where('id', $id)->first();
        // passing data transaksi yang didapat ke view edit.blade.php
        return view('transaksi.detail', compact('transaksi'));
    }

    public function masaPeminjaman()
    {
        // mengambil data transaksi berdasarkan id yang dipilih
        $masa_peminjaman = Transaksi::where('status', 0)->get();
        // passing data transaksi yang didapat ke view edit.blade.php
        return view('transaksi.masa', compact('transaksi', 'masa_peminjaman'));
    }

    public function sudahDikembalikan()
    {
        // mengambil data transaksi berdasarkan id yang dipilih
        $sudah_dikembalikan = Transaksi::where('status', 1)->get();
        // passing data transaksi yang didapat ke view edit.blade.php
        return view('transaksi.sudah', compact('transaksi', 'sudah_dikembalikan'));
    }

    public function belumDikembalikan()
    {
        // mengambil data transaksi berdasarkan id yang dipilih
        $belum_dikembalikan = Transaksi::where('status', 2)->get();
        // passing data transaksi yang didapat ke view edit.blade.php
        return view('transaksi.belum', compact('transaksi', 'belum_dikembalikan'));
    }

    public function edit($id)
    {
        // mengambil data transaksi berdasarkan id yang dipilih
        $transaksi = Transaksi::where('id', $id)->first();
        $bukuCombo = $this->loadBukuCombo();
        $peminjamCombo = $this->loadPeminjamCombo();
        // passing data transaksi yang didapat ke view edit.blade.php
        return view('transaksi.edit', compact('transaksi', 'bukuCombo', 'peminjamCombo'));
    }

    public function update(Request $request)
    {
        // dd($request->id);
        // untuk validasi form
        $this->validate($request, [
            'no_transaksi' => 'required',
            'tanggal' => 'required',
            'peminjam_id' => 'required',
            'buku_id' => 'required',
            'created_by' => 'required',
        ]);

        $transaksi = Transaksi::find($request->id);
        $transaksi->no_transaksi = $request->no_transaksi;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->peminjam_id = $request->peminjam_id;
        $transaksi->buku_id = $request->buku_id;
        $transaksi->created_by = $request->created_by;
        $transaksi->save();
        // alihkan halaman edit ke halaman transaksi
        return redirect('/transaksi')->with('status', 'Data Transaksi Berhasil DiUbah');
    }
    public function destroy($id)
    {
        // menghapus data transaksi berdasarkan id yang dipilih
        Transaksi::where('id', $id)->delete();
        // Alihkan ke halaman transaksi
        return redirect('/transaksi')->with('status', 'Data Transaksi Berhasil DiHapus');
    }

    public function approveBook($id)
    {
        // dd($id);
        // mengambil data transaksi berdasarkan id yang dipilih
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update(['status' => 1]);
        // passing data transaksi yang didapat ke view edit.blade.php
        return redirect()->route('transaksi')->with('status', 'Buku Berhasil Dikembalikan');
    }

    private function loadBukuCombo($show_all = false)
    {
        $arr_data = array();

        if ($show_all) {
            $arr_data[''] = _('common.combo_select', ['record' => _('module.role.module_name')]);
        }

        $fetchFleet = Buku::get();
        $arr_data[''] = '--- Pilih Buku ---';
        if ($fetchFleet != NULL) {
            foreach ($fetchFleet as $item) {
                $arr_data[$item->id] = $item->nama;
            }
        }

        return $arr_data;
    }

    private function loadPeminjamCombo($show_all = false)
    {
        $arr_data = array();

        if ($show_all) {
            $arr_data[''] = _('common.combo_select', ['record' => _('module.role.module_name')]);
        }

        $fetchFleet = Peminjam::get();
        $arr_data[''] = '--- Pilih Anggota ---';
        if ($fetchFleet != NULL) {
            foreach ($fetchFleet as $item) {
                $arr_data[$item->id] = $item->nama;
            }
        }

        return $arr_data;
    }
}
