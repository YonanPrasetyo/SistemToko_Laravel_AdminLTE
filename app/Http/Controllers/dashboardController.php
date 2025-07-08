<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Konsumen;

class dashboardController extends Controller
{
    public function index()
    {
        try{
            $produk = Produk::count();
            $transaksi = Transaksi::count();
            $konsumen = Konsumen::count();
            $total = Transaksi::sum('total');
            return view('welcome', [
                'produk' => $produk,
                'transaksi' => $transaksi,
                'konsumen' => $konsumen,
                'total' => $total
            ]);
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
