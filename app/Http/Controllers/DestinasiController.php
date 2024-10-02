<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DestinasiController extends Controller
{
    public function showdst()
    {
        $data['destinasi'] = Destinasi::orderby('nama_destinasi', 'asc')->get();
        $data['total_destinasi'] = Destinasi::count();
        $data['destinasi'] = Destinasi::paginate(10);

        return view('daftar-destinasi', $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('cari');
        $query = Destinasi::query();

        if ($search) {
        $query->where('nama_destinasi', 'LIKE', '%'.$request->cari.'%')->get();
        }
        $data['destinasi'] = $query->paginate(10)->appends(['search' => $search]);

        return view('daftar-destinasi', $data);
    }

    public function create()
    {
        return view('tambah-destinasi');
    }

    public function add(Request $request)
    {
        $request->validate([
            'nama_destinasi' => ['required', 'unique:destinasis,nama_destinasi'],
            'deskripsi' => 'required'
            
        ], [
            'nama_destinasi.required' => 'Nama destinasi tidak boleh kosong',
            'nama_destinasi.unique' => 'Destinasi sudah ada, silahkan tambah destinasi yang lain yang lain',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong'
        ]);

        $destinasi = Destinasi::create([
            'nama_destinasi' => $request->nama_destinasi,
            'deskripsi' => $request->deskripsi
        ]);

        if ($destinasi) {
            Session::flash('pesan', 'Data berhasil disimpan');
        }else {
            Session::flash('pesan', 'Data Gagal disimpan');
        }

        return redirect('daftar-destinasi');
    }

    public function edit(Request $request)
    {
        $data['destinasi'] = Destinasi::find($request->id);
        return view('edit-destinasi', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_destinasi' => 'required',
            'deskripsi' => 'required'
            
        ], [
            'nama_destinasi.required' => 'Nama destinasi tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong'
        ]);

        $update = Destinasi::where('id', $request->id)->update([
            'nama_destinasi' => $request->nama_destinasi,
            'deskripsi' => $request->deskripsi
        ]);

        if ($update) {
            Session::flash('pesan', 'Data berhasil diubah');
        }else{
            Session::flash('pesan', 'Data gagal diubah');
        }

        return redirect('daftar-destinasi');
    }

    public function delete(Request $request)
    {
        $destinasi = Destinasi::find($request->id);
        $delete = Destinasi::where('id', $destinasi->id)->delete();
        if ($delete) {
            Session::flash('pesan', 'Data berhasil dihapus');
        }else{
            Session::flash('pesan', 'Data gagal dihapus');
        }

        return redirect('daftar-destinasi');
    }
}
