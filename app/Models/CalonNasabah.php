<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonNasabah extends Model
{
    use HasFactory;

    protected $table = 'calon_nasabah';
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan_id',
        'provinsi_id',
        'kab_kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'nama_jalan',
        'rt',
        'rw',
        'nominal_setor',
        'kantor_cabang_id',
        'status',
        'approved_by',
    ];
}
