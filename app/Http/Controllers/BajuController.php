<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Baju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('isAdmin');
    
    $toko = Toko::where('id_admin', auth()->user()->id)->get();
    $baju = Baju::whereIn('id_toko', $toko->pluck('id'))->get();

    return view('baju', [
        'toko' => $toko,
        'baju' => $baju,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');

        $toko = Toko::all();

        return view('bajucreate', [
        'toko' => $toko,
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
            'nama_produk' => 'required|max:255',
            'harga' => 'required|integer|min:0',
            'image' => 'image|file|required',
            'nama_toko' => 'required|max:255',
        ]);

        $imagePath = $request->file('image')->store('images');
        

        Baju::create([
            'nama' => $request->nama_produk,
            'harga' => $request->harga,
            'image' => $imagePath,
            'id_toko' => $request->nama_toko
        ]);

        return redirect('/admin/produk')->with('sukses', 'Produk baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function show(Baju $baju)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('isAdmin');

        $baju = Baju::findOrFail($id);

        $toko = Toko::where('id_admin', auth()->user()->id)->get();
        

        return view('bajuedit', [
            'baju' => $baju,
            'toko' => $toko,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baju $baju, $id)
{
    $this->authorize('isAdmin');

    $request->validate([
        'nama_produk' => 'required|max:255',
        'harga' => 'required|integer|min:0',
        'image' => 'image|file',
        'nama_toko'=> 'required|exists:toko,id'
    ]);

    if ($request->hasFile('image')) {
        if ($baju->image) {
            Storage::delete($baju->image);
        }
        $imagePath = $request->file('image')->store('images');
    } else {
        $imagePath = $baju->image;
    }

    $baju = Baju::findOrFail($id)->update([
        'nama' => $request->nama_produk,
        'harga' => $request->harga,
        'image' => $imagePath,
        'id_toko' => $request->nama_toko,
    ]);

    // Redirect ke halaman produk dengan pesan sukses
    return redirect('/admin/produk')->with('sukses', 'Produk telah diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baju  $baju
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baju $baju, $id)
    {
        $baju::where('id', $id) ->delete();
        
        return redirect('/admin/produk')->with('sukses', 'Produk telah dihapus!');
    }
}
