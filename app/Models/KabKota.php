<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabKota extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'kab_kota';

    // Fillable attributes
    protected $fillable = [
        'provinsi_id',
        'nama_kab_kota',
    ];
}
