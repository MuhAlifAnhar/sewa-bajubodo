<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $validasi = $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required']
        ]);
         if(Auth::attempt($validasi)){
        //  jika dia guru
          if(Auth::user()->role_id === 1 ){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
           }
          if(Auth::user()->role_id === 2 ){
            if(Auth::user()->toko){
                if(Auth::user()->toko->id_admin === Auth::user()->id ){
                    $request->session()->regenerate();
                    return redirect()->intended('/admin');
                } else {
                    return back()->with('loginError','Login gagal! Anda Bukan Admin Toko');
                }
            }else {
                return back()->with('loginError', 'Login gagal! Anda tidak memiliki toko.');
            }
           }
           if(Auth::user()->role_id === 3 ){
                $request->session()->regenerate();
                return redirect()->intended('/super');
           }
         }

         return back()->with('loginError','Username atau Password Anda Salah!');
    }
    public function akunbaru(){
        return view('sesi.akunbaru');

    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => ['required','max:255'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','min:5','max:255']
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);



        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role,
        ]);


        $request->session()->flash('success','Registrasi sukses! Silahkan login');

        return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

    public function admin(){
        return view('sesi.admin');
    }
}
