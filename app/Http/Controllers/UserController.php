<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $pengguna = User::all();
        return view('pengguna.list', compact('pengguna'));
    }

    public function create()
    {
        // memanggil view create
        $pengguna = User::get();
        $aksesCombo = $this->loadAksesCombo();

        return view('pengguna.create', compact('aksesCombo', 'pengguna'));
    }

    public function add(Request $request)
    {
        // dd($request);
        // untuk validasi form
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'akses' => 'required',
        ]);
        // insert data ke table pengguna
        $pengguna = new User();
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->akses = $request->akses;
        $pengguna->password = bcrypt(request('password'));
        $pengguna->save();
        // alihkan halaman tambah kategori ke halaman pengguna
        return redirect('/pengguna')->with('status', 'Data pengguna Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        // mengambil data pengguna berdasarkan id yang dipilih
        $pengguna = User::where('id', $id)->first();
        // passing data pengguna yang didapat ke view edit.blade.php
        return view('pengguna.detail', compact('pengguna'));
    }

    public function edit($id)
    {
        // mengambil data pengguna berdasarkan id yang dipilih
        $pengguna = User::where('id', $id)->first();
        // passing data pengguna yang didapat ke view edit.blade.php
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request)
    {
        // dd($request->id);
        // untuk validasi form
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'akses' => 'required',
        ]);

        $pengguna = User::find($request->id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->akses = $request->akses;
        $pengguna->password = bcrypt(request('password'));
        $pengguna->save();
        // alihkan halaman edit ke halaman pengguna
        return redirect('/pengguna')->with('status', 'Data pengguna Berhasil DiUbah');
    }
    public function destroy($id)
    {
        // menghapus data pengguna berdasarkan id yang dipilih
        User::where('id', $id)->delete();
        // Alihkan ke halaman pengguna
        return redirect('/pengguna')->with('status', 'Data pengguna Berhasil DiHapus');
    }

    private function loadAksesCombo($show_all = false)
    {
        $arr_data = array();

        if ($show_all) {
            $arr_data[''] = _('common.combo_select', ['record' => _('module.role.module_name')]);
        }

        $fetchFleet = User::get();
        $arr_data[''] = '--- Pilih Akses ---';
        if ($fetchFleet != NULL) {
            foreach ($fetchFleet as $item) {
                $arr_data[$item->id] = $item->akses;
            }
        }

        return $arr_data;
    }
}
