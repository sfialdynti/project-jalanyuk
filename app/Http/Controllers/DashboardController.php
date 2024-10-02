<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kategori;
use App\Models\Tempat_wisata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adm()
    {
        $user = Auth::user();
        $data = [
            'total_user' => User::count(),
            'total_kategori' => Kategori::count(),
            'total_destinasi' => Destinasi::count(),
            'total_wisata' => Tempat_wisata::count(),
            'tempat_wisata' => Tempat_wisata::get(),
            'tempat_wisata' => Tempat_wisata::paginate(10),
        ];
        return view('dashboard', ['user' => $user]+ $data);
    }


}
