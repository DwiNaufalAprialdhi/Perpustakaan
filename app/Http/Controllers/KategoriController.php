<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // mengambil data dari table kategori
        $kategori = Kategori::all();

        // mengirim data buku ke view kategori
        return view('kategori.list', compact('kategori'));
    }

    public function create()
    {
        // memanggil view create
        return view('kategori.create');
    }

    public function add(Request $request)
    {
        // dd($request);
        // untuk validasi form
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        // insert data ke table kategori
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();
        // alihkan halaman tambah kategori ke halaman kategori
        return redirect('/kategori')->with('status', 'Data kategori Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        // mengambil data kategori berdasarkan id yang dipilih
        $kategori = Kategori::where('id', $id)->first();
        // passing data kategori yang didapat ke view edit.blade.php
        return view('kategori.detail', compact('kategori'));
    }

    public function edit($id)
    {
        // mengambil data kategori berdasarkan id yang dipilih
        $kategori = Kategori::where('id', $id)->first();
        // passing data kategori yang didapat ke view edit.blade.php
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request)
    {
        // dd($request->id);
        // untuk validasi form
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $kategori = Kategori::find($request->id);
        // dd($buku);
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();
        // alihkan halaman edit ke halaman kategori
        return redirect('/kategori')->with('status', 'Data kategori Berhasil DiUbah');
    }
    public function destroy($id)
    {
        // menghapus data kategori berdasarkan id yang dipilih
        Kategori::where('id', $id)->delete();
        // Alihkan ke halaman kategori
        return redirect('/kategori')->with('status', 'Data kategori Berhasil DiHapus');
    }
}
