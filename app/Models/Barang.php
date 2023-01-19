<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barangs','nama_mereks','nama_distributors','harga_barangs','harga_belis','stoks','tgl_masuks','nama_petugass'
   ];
}
