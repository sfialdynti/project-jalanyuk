<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kategori;
use App\Models\Tempat_wisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showhome()
    {
        $data['kategori'] = Kategori::all();
        $data['destinasi'] = Destinasi::all();
        $data['wisata'] = Tempat_wisata::all();
        return view('home', $data);
    }

    // public function search(Request $request)
    // {
    //     $cari= $request->input('search');
    //     $wisata = Tempat_wisata::where('nama_wisata', 'LIKE', '%' . $cari . '%')->first();

    // if ($wisata) {
    //     return redirect()->route('detail.wisata', ['id' => $wisata->id]);
    // } else {
    //     return redirect()->back()->with('error', 'Wisata tidak ditemukan.');
    // }
    // }

    public function search(Request $request)
    {
        $cari= $request->input('search');
        $wisata = Tempat_wisata::where('nama_wisata', 'LIKE', '%' . $cari . '%')->get();

        if ($wisata->isNotEmpty()) {
            return view('hasil_pencarian', compact('wisata', 'cari'));
        } else {
            return redirect()->back()->with('error', 'Wisata tidak ditemukan.');
        }
    }

    public function dtlwisata(Request $request)
    {
        $data['wisata'] = Tempat_wisata::find($request->id);
        $data['destinasi'] = Destinasi::all();
        $data['kategori'] = Kategori::all();

        return view('detailwisata', $data);
    }

    public function dtldestinasi(Request $request)
    {
        $data['dst'] = Destinasi::all();
        $data['ktgr'] = Kategori::all();
        $data['destinasi'] = Destinasi::with('tempat_wisatas')->find($request->id);
        $data['wisata'] = $data['destinasi']->tempat_wisatas;

        return view('destinasi', $data);
    }

    public function dtlkategori(Request $request)
    {
        $data['dst'] = Destinasi::all();
        $data['ktgr'] = Kategori::all();
        $data['kategori'] = Kategori::with('tempat_wisatas')->find($request->id);
        $data['wisata'] = $data['kategori']->tempat_wisatas;

        return view('kategori', $data);

    }
}
