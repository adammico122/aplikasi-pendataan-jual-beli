<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [ 'nama_produk', 'kode_produk', 'id_jenis', 'jumlah_produk', 'berat_produk', 'deskripsi_produk', 'harga_modal', 'harga_jual' ];
    protected $dates = [ 'deleted_at' ];
}
