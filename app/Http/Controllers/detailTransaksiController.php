<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Produk;

class detailTransaksiController extends Controller
{
    public function store(request $request)
    {
        try{
            $validate = $request->validate([
                'id_transaksi' => 'required',
                'id_produk' => 'required',
                'jumlah' => 'required',
            ]);


            $harga_satuan = Produk::find($validate['id_produk'])->harga_jual;
            $total = $harga_satuan * $validate['jumlah'];

            DetailTransaksi::create([
                'id_transaksi' => $validate['id_transaksi'],
                'id_produk' => $validate['id_produk'],
                'jumlah' => $validate['jumlah'],
                'harga_satuan' => $harga_satuan,
                'total' => $total
            ]);

            // stok untuk tabel produk
            $produk = Produk::find($validate['id_produk']);
            if ($produk->stok < $validate['jumlah']) {
                return redirect()->back()->with('error', 'Stok produk tidak mencukupi');
            }
            $produk->stok = $produk->stok - $validate['jumlah'];
            $produk->save();

            // total dan stok untuk tabel transaksi
            $transaksi = Transaksi::find($validate['id_transaksi']);
            $transaksi->total = $transaksi->total + $total;
            $transaksi->save();


            return redirect('/transaksi/' . $validate['id_transaksi'])->with('success', 'Detail Transaksi berhasil ditambahkan');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $detail_transaksi = DetailTransaksi::find($id);

            // total dan stok untuk tabel transaksi
            $transaksi = Transaksi::find($detail_transaksi->id_transaksi);
            $transaksi->total = $transaksi->total - $detail_transaksi->total;
            $transaksi->save();

            // stok untuk tabel produk
            $produk = Produk::find($detail_transaksi->id_produk);
            $produk->stok = $produk->stok + $detail_transaksi->jumlah;
            $produk->save();

            DetailTransaksi::where('id_detail_transaksi', $id)->delete();
            return redirect()->back()->with('success', 'Detail Transaksi berhasil dihapus');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
