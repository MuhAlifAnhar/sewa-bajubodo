<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Baju;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isSuper');
        return view('toko', [
            'toko' => Toko::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isSuper');
        
        $admin = User::where('role_id', 2)->get();

        return view('tokocreate', [
            'admin' => $admin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'akun_admin' => 'required|max:255'
        ]);

        Toko::create([
            'nama_toko' => $request->nama,
            'id_admin' => $request->akun_admin
        ]);

        return redirect('/admin/namatoko')->with('sukses', 'Toko baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baju = \App\Models\Baju::where('id_toko', $id)->first();

        if ($baju) {
            $baju->delete();
        }

        \App\Models\Toko::destroy($id);
        
        return redirect('/admin/namatoko')->with('sukses', 'Toko telah dihapus!');
    }
}