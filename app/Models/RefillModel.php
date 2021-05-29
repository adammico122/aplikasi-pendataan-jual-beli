<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefillModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'refill';
    protected $primaryKey = 'id_refill';
    protected $fillable = ['id_produk','tanggal_refill','user'];
    protected $dates = ['deleted_at','tanggal_refill'];
}
