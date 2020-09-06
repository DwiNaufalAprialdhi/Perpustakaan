<?php

namespace App\Http\Controllers;

use App\Model\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // mengambil data dari table peminjam
        $peminjam = Peminjam::all();

        // mengirim data buku ke view peminjam
        return view('peminjam.list', compact('peminjam'));
    }

    public function create()
    {
        // memanggil view create
        return view('peminjam.create');
    }

    public function add(Request $request)
    {
        // dd($request);
        // untuk validasi form
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        // insert data ke table peminjam
        $peminjam = new Peminjam();
        // dd($buku);
        $peminjam->nama = $request->nama;
        $peminjam->email = $request->email;
        $peminjam->no_telp = $request->no_telp;
        $peminjam->alamat = $request->alamat;
        $peminjam->save();
        // alihkan halaman tambah peminjam ke halaman peminjam
        return redirect('/peminjam')->with('status', 'Data anggota Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        // mengambil data peminjam berdasarkan id yang dipilih
        $peminjam = Peminjam::where('id', $id)->first();
        // passing data peminjam yang didapat ke view edit.blade.php
        return view('peminjam.detail', compact('peminjam'));
    }

    public function edit($id)
    {
        // mengambil data peminjam berdasarkan id yang dipilih
        $peminjam = Peminjam::where('id', $id)->first();

        // passing data peminjam yang didapat ke view edit.blade.php
        return view('peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request)
    {
        // dd($request->id);
        // untuk validasi form
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $peminjam = Peminjam::find($request->id);
        $peminjam->nama = $request->nama;
        $peminjam->email = $request->email;
        $peminjam->no_telp = $request->no_telp;
        $peminjam->alamat = $request->alamat;
        $peminjam->save();
        // alihkan halaman edit ke halaman peminjam
        return redirect('/peminjam')->with('status', 'Data anggota Berhasil DiUbah');
    }
    public function destroy($id)
    {
        // menghapus data peminjam berdasarkan id yang dipilih
        Peminjam::where('id', $id)->delete();
        // Alihkan ke halaman peminjam
        return redirect('/peminjam')->with('status', 'Data anggota Berhasil DiHapus');
    }
}
