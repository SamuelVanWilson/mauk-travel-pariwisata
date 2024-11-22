<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = 'Data Semua Pengguna';
        $user = Auth::user();
        $allUser = User::with('role')->get();

        return view('auth.admin.index', compact('title', 'user', 'allUser'));
    }
    
    public function edit_user(User $akunUser){
        $title = 'Data Semua Pengguna';
        $user = Auth::user();

        return view('auth.update.akun', compact('title', 'user', 'allUser', 'akunUser'));
    }

    public function destroy_akun(User $akunUser){
        $akunUser->delete();
        notify()->success('Data Akun Berhasil Dihapus');
        return redirect()->route('auth.index');
    }

    public function login()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $title = 'Register';
        return view('auth.register', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register_proses(Request $request)
    {      
        $remember = $request->has('remember');
        $credential = $request->only('email', 'password');
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:4',
            'no_handphone' => 'required|numeric|regex:/^\+62[0-9]{10,13}$/',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash password
            'no_handphone' => $request->no_handphone,
        ]);
        if (Auth::attempt($credential,$remember)) {
            notify()->success('Berhasil Membuat Akun');
            return redirect()->route('point');
        }
        notify()->error('Terjadi Kesalahan');
        return redirect()->route('point');
    }

    public function login_proses(Request $request){
        $credential = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credential, $remember)) {
            notify()->success('Berhasil Masuk');
            return redirect()->route('point');
        }
        notify()->error('Akun Tidak Ditemukan');
        return redirect()->route('point');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $title = 'Home';
        $user = Auth::user();
        return view('auth.admin.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $dataUserSebelumnya = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'no_handphone' => 'required|numeric|regex:/^\+62[0-9]{10,13}$/'
        ]);
        
        $data = $request->except('password', 'gambar', '_token', '_method', 'password_lama', 'password_baru');

        if (!is_null($request->password_baru )) {
            if (password_verify($request->password_lama, $dataUserSebelumnya->password)) {
                $request->validate([ 'password_baru' => 'string|min:4']);
                $data['password'] = Hash::make($request->password_baru);
            } else {
                notify()->error('Password Lama Tidak Cocok');
                return redirect()->route('auth.edit');
            }
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar'); 
            $request->validate(['gambar' => 'image|mimes:jpg,png,jpeg:max:2048']);
            if ($dataUserSebelumnya->gambar != 'user.jpg') {
                Storage::delete('public/profile/', $dataUserSebelumnya->gambar);
            }

            $gambar->storeAs('public/profile', $gambar->hashName());
            $data['gambar'] = $gambar->hashName();
        }

        User::where('id', $dataUserSebelumnya->id)->update($data);
        notify()->success('Berhasil Mengganti Profile');
        return redirect()->route('auth.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        notify()->success('Berhasil Keluar Dari Akun');
        return redirect()->route('point');
    }
}
