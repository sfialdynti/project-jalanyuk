<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function showktgr()
    {
        $data['kategori'] = Kategori::orderby('nama_kategori', 'asc')->get();
        $data['total_kategori'] = Kategori::count();
        $data['kategori'] = Kategori::paginate(10);

        return view('daftar-kategori', $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('cari');
        $query = Kategori::query();

        if ($search) {
        $query->where('nama_kategori', 'LIKE', '%'.$request->cari.'%')->get();
        }
        $data['kategori'] = $query->paginate(10)->appends(['search' => $search]);

        return view('daftar-kategori', $data);
    }

    public function create()
    {
        return view('tambah_kategori');
    }

    public function add(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'unique:kategoris,nama_kategori'],
            'deskripsi' => 'required'
            
        ], [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            'nama_kategori.unique' => 'Kategori sudah ada, silahkan tambah kategori yang lain yang lain',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong'
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        if ($kategori) {
            Session::flash('pesan', 'Data berhasil disimpan');
        }else {
            Session::flash('pesan', 'Data Gagal disimpan');
        }

        return redirect('daftar-kategori');
    }

    public function edit(Request $request)
    {
        $data['kategori'] = Kategori::find($request->id);
        return view('edit-kategori', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
            
        ], [
            'nama_kategori.required' => 'Nama destinasi tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong'
        ]);

        $update = Kategori::where('id', $request->id)->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        if ($update) {
            Session::flash('pesan', 'Data berhasil diubah');
        }else{
            Session::flash('pesan', 'Data gagal diubah');
        }

        return redirect('daftar-kategori');
    }

    public function delete(Request $request)
    {
        $kategori = Kategori::find($request->id);
        $delete = Kategori::where('id', $kategori->id)->delete();
        if ($delete) {
            Session::flash('pesan', 'Data berhasil dihapus');
        }else{
            Session::flash('pesan', 'Data gagal dihapus');
        }

        return redirect('daftar-kategori');
    }
}
