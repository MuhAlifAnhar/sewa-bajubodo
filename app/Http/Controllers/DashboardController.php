<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Toko;
use App\Models\Baju;
use App\Models\Keterangan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        // $this->authorize('isUser');
        return view('home');
    }
    
    public function produk(Request $request, $tokoId = null){
        // $this->authorize('isUser');
    
    // $toko = Toko::where('id_admin', auth()->user()->id)->get();
    // $baju = Baju::whereIn('id_toko', $toko->pluck('id'))->get();

    //     return view('produk', [
    //         'toko' => $toko,
    //         'baju' => $baju
    //     ]);
        // $bajus = Baju::all();

        $tokos = Toko::all();

        $keterangan = Keterangan::all();

        $baju = $tokoId ? Baju::where('id_toko', $tokoId)->get() : collect();

        return view('produk', [
        'tokos' => $tokos,
        'keterangan' => $keterangan,
        'baju' => $baju,
        'selectedTokoId' => $tokoId
    ]);
    }

    public function updateStatus(Request $request)
    {
        // Debug: Output request data
        Log::info('Update Status Request:', $request->all());

        try {
            // Validasi request jika perlu
            $request->validate([
                'baju_id' => 'required|integer|exists:baju,id',
            ]);

            // Debug: Check if baju_id is valid
            Log::info('Baju ID:', ['baju_id' => $request->baju_id]);

            // Temukan baju berdasarkan ID
            $baju = Baju::find($request->baju_id);

            // Debug: Check if baju is found
            if ($baju) {
                Log::info('Baju Found:', ['baju' => $baju]);

                // Update status baju
                if ($baju->nama_keterangan === 3) {
                    $baju->update(['nama_keterangan' => 2]);

                    Log::info('Status updated to "Di booking" for Baju ID:', ['baju_id' => $baju->id]);
                    return response()->json(['status' => 'success', 'message' => 'Status updated successfully']);
                } else {
                    Log::warning('Invalid status for Baju ID:', ['baju_id' => $baju->id]);
                }
            } else {
                Log::error('Baju not found for Baju ID:', ['baju_id' => $request->baju_id]);
            }
        } catch (\Exception $e) {
            // Debug: Log exception
            Log::error('Exception:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['status' => 'error', 'message' => 'Server error'], 500);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid status update'], 400);
    }

    public function kontak(){
        // $this->authorize('isUser');
        return view('kontak');
    }

    public function syarat(){
        // $this->authorize('isUser');
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
