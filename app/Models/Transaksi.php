<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barangs','harga_barangs','total_barangs','total_hargas','total_bayars','kembalians','tanggal_belis'
   ];
}
