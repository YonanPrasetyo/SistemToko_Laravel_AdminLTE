<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Konsumen;
use App\Models\Produk;

use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index()
    {
        try{
            $transaksi = Transaksi::with(['konsumen'])->get()->toArray();
            $konsumen = Konsumen::get(['id_konsumen', 'nama', 'no_hp'])->toArray();
            return view('transaksi.index', [
                'transaksi' => $transaksi,
                'konsumen' => $konsumen
            ]);
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try{
            $transaksi = Transaksi::with(['konsumen','detail_transaksi.produk'])->where('id_transaksi', $id)->first()->toArray();
            $produk = Produk::get(['id_produk', 'nama_produk', 'stok', 'harga_jual', 'satuan'])->toArray();
            return view('transaksi.show', [
                'transaksi' => $transaksi,
                'produk' => $produk
            ]);
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try{
            $validate = $request->validate([
                'id_konsumen' => 'required',
                'tanggal' => 'required',
            ]);

            Transaksi::create([
                'id_konsumen' => $validate['id_konsumen'],
                'tanggal' => $validate['tanggal'],
                'total' => 0
            ]);
            return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'id_konsumen' => 'required',
                'tanggal' => 'required',
            ]);

            Transaksi::where('id_transaksi', $id)->update([
                'id_konsumen' => $validate['id_konsumen'],
                'tanggal' => $validate['tanggal'],
            ]);
            return redirect('/transaksi')->with('success', 'Transaksi berhasil diubah');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            Transaksi::where('id_transaksi', $id)->delete();
            return redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
