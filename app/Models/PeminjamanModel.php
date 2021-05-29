<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PeminjamanModel extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $primaryKey = 'id_pinjaman';
    protected $fillable = ['nama_peminjaman', 'id_produk', 'jumlah_barang', 'tanggal_pinjam'];
}
