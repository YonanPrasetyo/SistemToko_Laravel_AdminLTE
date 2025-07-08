<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Kategori;

class kategoriController extends Controller
{
    public function index()
    {
        try {
            $kategori = Kategori::all()->toArray();
            return view('kategori.index', [
                'kategori' => $kategori
            ]);
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try{
            $validate = $request->validate([
                'nama_kategori' => 'required|string|max:255',
                'deskripsi' => 'nullable'
            ]);

            Kategori::create([
                'nama_kategori' => $validate['nama_kategori'],
                'deskripsi' => $validate['deskripsi']
            ]);
            return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'nama_kategori' => 'required|string|max:255',
                'deskripsi' => 'nullable'
            ]);

            Kategori::where('id_kategori', $id)->update([
                'nama_kategori' => $validate['nama_kategori'],
                'deskripsi' => $validate['deskripsi']
            ]);
            return redirect('/kategori')->with('success', 'Kategori berhasil diubah');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            Kategori::where('id_kategori', $id)->delete();
            return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
