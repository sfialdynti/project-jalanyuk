<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showusr()
    {
        $data['user'] = User::orderby('name', 'asc')->get();
        $data['total_user'] = User::count();
        $data['user'] = User::paginate(10);

        return view('daftar-user', $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('cari');
        $query = User::query();

        if ($search) {
            $query->where('name', 'LIKE', '%'.$request->cari.'%')->orWhere('email', 'LIKE', '%'.$request->cari.'%')->get();
        }
        $data['user'] = $query->paginate(5)->appends(['cari' => $search]);

        return view('daftar-user', $data);
    }

    public function create()
    {
        return view('tambah-user');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ], [
            'name.required' => 'Nama Lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus berjumlah minimal 6 karakter'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : DB ::raw('password')
        ]);

        if ($user) {
            Session::flash('pesan', 'Data berhasil disimpan');
        } else {
            Session::flash('pesan', 'Data Gagal disimpan');
        }

        return redirect('daftar-user');
    }

    public function edit(Request $request)
    {
        $data['user'] = User::find($request->id);
        return view('edit-user', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ], [
            'name.required' => 'Nama Lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus berjumlah minimal 6 karakter'
        ]);

        $update = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : DB ::raw('password')
        ]);

        if ($update) {
            Session::flash('pesan', 'Data berhasil diubah');
        }else{
            Session::flash('pesan', 'Data gagal diubah');
        }

        return redirect('daftar-user');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $delete = User::where('id', $user->id)->delete();
        if ($delete) {
            Session::flash('pesan', 'Data berhasil dihapus');
        }else{
            Session::flash('pesan', 'Data gagal dihapus');
        }

        return redirect('daftar-user');
    }


}
