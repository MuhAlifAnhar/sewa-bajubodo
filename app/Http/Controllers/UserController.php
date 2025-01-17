<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Baju;
use App\Models\Toko;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('isSuper');
        // return view('super', [
        //     'super' => User::all();
        // ])
        $this->authorize('isSuper');
        return view('akun', [
            'super' => User::where('role_id', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baju = \App\Models\Baju::where('id_admin', $id)->first();
        if ($baju) {
            $baju->delete();
        }

        $toko = \App\Models\Toko::where('id_admin', $id)->first();
        if ($toko) {
            $toko->delete();
        }

        \App\Models\User::destroy($id);
    
        return redirect('/super/akun')->with('sukses', 'Akun telah dihapus!');
    }


}
