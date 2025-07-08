<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class emailController extends Controller
{
    public function sendEmail() {
        $hari_lalu = now()->subDays(30);

        $top_5_produk = DB::table('detail_transaksi')
                        ->join('produk', 'detail_transaksi.id_produk', '=', 'produk.id_produk')
                        ->select(
                            'detail_transaksi.id_produk',
                            'produk.nama_produk',
                            DB::raw('COUNT(*) as total_terjual')
                        )
                        ->where('detail_transaksi.created_at', '>=', $hari_lalu)
                        ->groupBy('detail_transaksi.id_produk', 'produk.nama_produk')
                        ->orderByDesc('total_terjual')
                        ->limit(5)
                        ->get()
                        ->toArray();

        $email = 'yonanprasetyo91792@gmail.com';

        Mail::to($email)->send(new TestMail($top_5_produk));
        return redirect()->back()->with('success', 'Email berhasil dikirim');
    }
}
