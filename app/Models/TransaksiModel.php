<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class TransaksiModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['kode_transaksi', 'id_produk', 'jumlah_transaksi', 'harga_transaksi', 'tanggal_transaksi'];
    protected $dates = [ 'deleted_at', 'tanggal_transaksi' ];

    public static function kode()
    {
    	$kode = DB::table('transaksi')->max('kode_transaksi');
    	$addNol = '';
    	$kode = str_replace("TRX", "", $kode);
    	$kode = (int) $kode + 121042600;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "0000000000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00000000";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "000000";
    	}

    	$kodeBaru = "TRX".$incrementKode.$addNol;
    	return $kodeBaru;
    }
}
