<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsumen;

class konsumenController extends Controller
{
    public function index()
    {
        try{
            $konsumen = Konsumen::all()->toArray();
            return view('konsumen.index', [
                'konsumen' => $konsumen
            ]);
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try{
            $validate = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required',
                'no_hp' => 'required'
            ]);

            Konsumen::create([
                'nama' => $validate['nama'],
                'alamat' => $validate['alamat'],
                'no_hp' => $validate['no_hp']
            ]);
            return redirect('/konsumen')->with('success', 'Konsumen berhasil ditambahkan');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required',
                'no_hp' => 'required'
            ]);

            Konsumen::where('id_konsumen', $id)->update([
                'nama' => $validate['nama'],
                'alamat' => $validate['alamat'],
                'no_hp' => $validate['no_hp']
            ]);
            return redirect('/konsumen')->with('success', 'Konsumen berhasil diubah');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            Konsumen::where('id_konsumen', $id)->delete();
            return redirect('/konsumen')->with('success', 'Konsumen berhasil dihapus');
        }catch (Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
