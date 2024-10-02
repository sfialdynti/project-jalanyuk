<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kategori;
use App\Models\Tempat_wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function showisata()
    {
        $data['tempat_wisata'] = Tempat_wisata::orderby('nama_wisata', 'asc')->get();
        // $data['destinasi'] = Destinasi::all();
        // $data['kategori'] = Kategori::all();
        $data['tempat_wisata'] = Tempat_wisata::paginate(10);
        return view('daftar-wisata', $data);
    }

    public function search(Request $request){
        $search = $request->input('cari');
        $query = Tempat_wisata::query();

        if ($search) {
            $query->where('nama_wisata', 'LIKE', '%'.$request->cari.'%')
            ->orWhereHas('destinasis', function($query) use ($search){
                $query->where('nama_destinasi', 'LIKE', '%'.$search.'%');
            })
            ->orWhereHas('kategoris', function($query) use ($search){
                $query->where('nama_kategori', 'LIKE', '%'.$search.'%');
            })->get();
        }

        $data['tempat_wisata'] = $query->paginate(10)->appends(['cari' => $search]);
        return view('daftar-wisata', $data);
    }

    public function create()
    {
        $data['kategori'] = Kategori::all();
        $data['destinasi'] = Destinasi::all();
        return view('tambah-wisata', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nama_wisata' => ['required', 'unique:tempat_wisatas,nama_wisata'],
            'lokasi' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'deskripsi' => 'required',
            'destinasis_id' => 'required',
            'kategoris_id' => 'required',
            'foto' => 'image'
        ], [
            'nama_wisata.required' => 'Nama Tempat Wisata tidak boleh kosong',
            'nama_wisata.unique' => 'Nama Tempat wisata sudah ada, silakan input yang lain',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'longitude.required' => 'Longitude tidak boleh kosong',
            'latitude.required' => 'Longitude tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'destinasis_id.required' => 'Destinasi tidak boleh kosong',
            'kategoris_id.required' => 'Kategori tidak boleh kosong',
            'foto.image' => 'Foto harus menggunakan format yang benar'
        ]);

        $fileName = '';
        if ($request->file('foto')) {
            $extFile = $request->file('foto')->getClientOriginalExtension();
            $fileName = time() . "." . $extFile;
            $request->file('foto')->storeAs('public/foto', $fileName);
        }

        $tempat_wisata = Tempat_wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'lokasi' => $request->lokasi,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'deskripsi' => $request->deskripsi,
            'destinasis_id' => $request->destinasis_id,
            'kategoris_id' => $request->kategoris_id,
            'foto' => $fileName
        ]);

        if ($tempat_wisata) {
            Session::flash('pesan', 'Data berhasil disimpan');
        }else {
            Session::flash('pesan', 'Data Gagal disimpan');
        }

        return redirect('daftar-wisata');
    }

    public function edit(Request $request)
    {
        $data['tempat_wisata'] = Tempat_wisata::find($request->id);
        $data['kategori'] = Kategori::all();
        $data['destinasi'] = Destinasi::all();
        return view('edit-wisata', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required',
            'lokasi' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'deskripsi' => 'required',
            'destinasis_id' => 'required',
            'kategoris_id' => 'required',
            'foto' => 'image'
        ], [
            'nama_wisata.required' => 'Nama Tempat Wisata tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'longitude.required' => 'Longitude tidak boleh kosong',
            'latitude.required' => 'Longitude tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'destinasis_id.required' => 'Destinasi tidak boleh kosong',
            'kategoris_id.required' => 'Kategori tidak boleh kosong',
            'foto.image' => 'Foto harus menggunakan format yang benar'
        ]);

        $fileName = '';
        if ($request->file('foto')) {
            $extFile = $request->file('foto')->getClientOriginalExtension();
            $fileName = time() . "." . $extFile;
            $request->file('foto')->storeAs('public/foto', $fileName);
        }

        $update = Tempat_wisata::where('id', $request->id)->update([
            'nama_wisata' => $request->nama_wisata,
            'lokasi' => $request->lokasi,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'deskripsi' => $request->deskripsi,
            'destinasis_id' => $request->destinasis_id,
            'kategoris_id' => $request->kategoris_id,
            'foto' => $fileName
        ]);

        if ($update) {
            Session::flash('pesan', 'Data berhasil diubah');
        }else{
            Session::flash('pesan', 'Data gagal diubah');
        }

        return redirect('daftar-wisata');
    }

    public function delete(Request $request)
    {
        $tempat_wisata = Tempat_wisata::find($request->id);
        $delete = Tempat_wisata::where('id', $request->id)->delete();
        if ($delete) {
            if ($tempat_wisata->foto) {
                Storage::delete('foto/' .$tempat_wisata->foto);
            }
            Session::flash('pesan', 'Data berhasil dihapus');
        }else{
            Session::flash('pesan', 'Data gagal dihapus');
        }
        
        return redirect('daftar-wisata');
    }
}


