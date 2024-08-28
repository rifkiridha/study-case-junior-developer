<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';

    protected $fillable = [
        'kab_kota_id',
        'nama_kecamatan',
    ];

    /**
     * Get the kab_kota that owns the Kecamatan.
     */
    public function kabKota()
    {
        return $this->belongsTo(KabKota::class, 'kab_kota_id');
    }
}
