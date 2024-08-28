<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorCabang extends Model
{
    use HasFactory;
    protected $table = 'kantor_cabang';

    protected $fillable = ['nama_cabang', 'alamat_cabang'];

    // Optionally, you can set up relationships if needed
}
