<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class JenisModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['nama_jenis'];
    protected $dates = ['deleted_at'];
}
