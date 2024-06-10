<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Toko;
use App\Models\Baju;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        $this->authorize('isUser');
        return view('home');
    }
    
    public function produk(Request $request, $tokoId = null){
        $this->authorize('isUser');
    
    // $toko = Toko::where('id_admin', auth()->user()->id)->get();
    // $baju = Baju::whereIn('id_toko', $toko->pluck('id'))->get();

    //     return view('produk', [
    //         'toko' => $toko,
    //         'baju' => $baju
    //     ]);
        // $bajus = Baju::all();

        $tokos = Toko::all();

        $baju = $tokoId ? Baju::where('id_toko', $tokoId)->get() : collect();

        return view('produk', [
        'tokos' => $tokos,
        'baju' => $baju,
        'selectedTokoId' => $tokoId
    ]);
    }

    public function kontak(){
        $this->authorize('isUser');
        return view('kontak');
    }

    public function syarat(){
        $this->authorize('isUser');
        return view('syarat');
    }

    public function admin(){
        $this->authorize('isAdmin');
        return view('admin');
    }

    public function super(){
        $this->authorize('isSuper');
        return view('super');
    }
}
