<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Imports\ProdukImport;
use Maatwebsite\Excel\Facades\Excel;


class produkController extends Controller
{
    public function index()
    {
        try{
            $produk = Produk::with('kategori')->get()->toArray();
            $kategori = Kategori::get(['id_kategori', 'nama_kategori'])->toArray();
            return view('produk.index', [
                'produk' => $produk,
                'kategori' => $kategori
            ]);
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try{
            $validate = $request->validate([
                'nama_produk' => 'required|string|max:255',
                'id_kategori' => 'required',
                'stok' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'satuan' => 'required'
            ]);

            Produk::create([
                'nama_produk' => $validate['nama_produk'],
                'id_kategori' => $validate['id_kategori'],
                'stok' => $validate['stok'],
                'harga_beli' => $validate['harga_beli'],
                'harga_jual' => $validate['harga_jual'],
                'satuan' => $validate['satuan']
            ]);
            return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'nama_produk' => 'required|string|max:255',
                'id_kategori' => 'required',
                'stok' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'satuan' => 'required'
            ]);

            Produk::where('id_produk', $id)->update([
                'nama_produk' => $validate['nama_produk'],
                'id_kategori' => $validate['id_kategori'],
                'stok' => $validate['stok'],
                'harga_beli' => $validate['harga_beli'],
                'harga_jual' => $validate['harga_jual'],
                'satuan' => $validate['satuan']
            ]);
            return redirect('/produk')->with('success', 'Produk berhasil diubah');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            Produk::where('id_produk', $id)->delete();
            return redirect('/produk')->with('success', 'Produk berhasil dihapus');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        try{
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);

            Excel::import(new ProdukImport, $request->file('file'));

            return redirect()->route('produk.index')->with('success', 'Data produk berhasil diimport!');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
