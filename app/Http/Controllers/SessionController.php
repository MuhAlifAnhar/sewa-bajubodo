<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view("sesi.index");
    }
    // function login(Request $request){
    //     $request->validate([
    //         'email'=>'required',
    //         'password'=>'required'
    //     ]);
    //     $infologin = [
    //         'email'=>$request->email,
    //         'password'=>$request->password
    //     ];
    //     if(Auth::attempt($infologin)){
    //         //kalau otentikasi sukses
    //         return redirect()->route('dashboard');
    //     }else{
    //         //kalau otentikasi gagal
    //         return redirect()->route('login')->with('Failed','Email atau Password Salah');
    //     }
    // }
}
