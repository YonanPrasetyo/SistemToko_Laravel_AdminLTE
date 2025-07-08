<?php

namespace App\Imports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Produk([
            'nama_produk'  => $row['nama_produk'],
            'id_kategori'  => $row['id_kategori'],
            'stok'         => $row['stok'],
            'harga_beli'   => $row['harga_beli'],
            'harga_jual'   => $row['harga_jual'],
            'satuan'       => $row['satuan'],
        ]);
    }
}
