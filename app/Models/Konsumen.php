<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $table = 'konsumen';
    protected $primaryKey = 'id_konsumen';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    protected $guarded = ['id_konsumen'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_konsumen', 'id_konsumen');
    }
}
