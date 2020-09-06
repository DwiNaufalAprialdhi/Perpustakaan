<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Buku;
use App\Model\Kategori;


class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // mengambil data dari table buku
        $buku = Buku::all();

        // mengirim data buku ke view buku
        return view('buku.list', compact('buku'));
    }

    public function create()
    {
        $buku = Kategori::all();
        // memanggil view create
        return view('buku.create', compact('buku'));
    }

    public function add(Request $request)
    {
        // dd($request);
        // untuk validasi form
        $this->validate($request, [
            'nama' => 'required',
            'kategori_id' => 'required',
            'no_buku' => 'required',
            'deskripsi' => 'required',
        ]);
        // insert data ke table buku
        $buku = new Buku();
        // dd($buku);
        $buku->nama = $request->nama;
        $buku->kategori_id = $request->kategori_id;
        $buku->no_buku = $request->no_buku;
        $buku->deskripsi = $request->deskripsi;
        $buku->save();
        // alihkan halaman tambah buku ke halaman buku
        return redirect('/buku')->with('status', 'Data Buku Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        // mengambil data buku berdasarkan id yang dipilih
        $buku = Buku::where('id', $id)->first();
        // passing data buku yang didapat ke view edit.blade.php
        return view('buku.detail', compact('buku'));
    }

    public function edit($id)
    {
        // mengambil data buku berdasarkan id yang dipilih
        $buku = Buku::where('id', $id)->first();
        $kategoriCombo = $this->loadKategoriCombo();
        // passing data buku yang didapat ke view edit.blade.php
        return view('buku.edit', compact('buku', 'kategoriCombo'));
    }

    public function update(Request $request)
    {
        // dd($request->id);
        // untuk validasi form
        $this->validate($request, [
            'nama' => 'required',
            'kategori_id' => 'required',
            'no_buku' => 'required',
            'deskripsi' => 'required',
        ]);

        $buku = Buku::find($request->id);
        // dd($buku);
        $buku->nama = $request->nama;
        $buku->kategori_id = $request->kategori_id;
        $buku->no_buku = $request->no_buku;
        $buku->deskripsi = $request->deskripsi;
        $buku->save();
        // alihkan halaman edit ke halaman buku
        return redirect('/buku')->with('status', 'Data Buku Berhasil DiUbah');
    }
    public function destroy($id)
    {
        // menghapus data buku berdasarkan id yang dipilih
        Buku::where('id', $id)->delete();
        // Alihkan ke halaman buku
        return redirect('/buku')->with('status', 'Data Buku Berhasil DiHapus');
    }

    private function loadKategoriCombo($show_all = false)
    {
        $arr_data = array();

        if ($show_all) {
            $arr_data[''] = _('common.combo_select', ['record' => _('module.role.module_name')]);
        }

        $fetchFleet = Kategori::get();
        $arr_data[''] = '--- Pilih Kategori ---';
        if ($fetchFleet != NULL) {
            foreach ($fetchFleet as $item) {
                $arr_data[$item->id] = $item->nama;
            }
        }

        return $arr_data;
    }
}
