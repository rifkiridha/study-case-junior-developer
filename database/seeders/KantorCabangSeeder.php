<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KantorCabangSeeder extends Seeder
{
    public function run()
    {
        DB::table('kantor_cabang')->insert([
            [
                'nama_cabang' => 'KCP Pondok Kelapa, Jakarta Timur',
                'alamat_cabang' => 'Jl. Raya Kalimalang No. 4B, Pondok Kelapa, Jatinegara, Jakarta Timur, DKI Jakarta 13450'
            ],
            [
                'nama_cabang' => 'KCP Cipulir, Jakarta Selatan',
                'alamat_cabang' => 'Jl. Raya Ciledug No. 20 B-c 5, Cipulir, Kebayoran Lama, Jakarta Selatan, DKI Jakarta 12230'
            ],
            [
                'nama_cabang' => 'KCP Jatibaru, Jakarta Pusat',
                'alamat_cabang' => 'Gedung Dinas Teknis Pemprov DKI, Lt. Dasar, Jl. Taman Jatibaru I No. 4, Cideng, Gambir, Jakarta Pusat, DKI Jakarta 10150'
            ],
            [
                'nama_cabang' => 'KCP Pasar Minggu, Jakarta Selatan',
                'alamat_cabang' => 'Jl. Raya Pasar Minggu No. 13, Pejaten Timur, Pasar Minggu, Jakarta Selatan, DKI Jakarta'
            ],
            [
                'nama_cabang' => 'KCP Kalimalang, Jakarta Timur',
                'alamat_cabang' => 'Jl. Raya Kalimalang, Cipinang Muara, Jakarta Timur, DKI Jakarta'
            ],
            [
                'nama_cabang' => 'KCP Otista, Jakarta Timur',
                'alamat_cabang' => 'Jl. Otista Raya No. 15, Bidara Cina, Jakarta Timur, DKI Jakarta'
            ],
            [
                'nama_cabang' => 'KCP Cikini, Jakarta Pusat',
                'alamat_cabang' => 'Jl. Cikini Raya No. 12, Menteng, Jakarta Pusat, DKI Jakarta'
            ],
            [
                'nama_cabang' => 'KCP Pasar Rebo, Jakarta Timur',
                'alamat_cabang' => 'Jl. Raya Bogor KM 25, Pasar Rebo, Jakarta Timur, DKI Jakarta'
            ],
            [
                'nama_cabang' => 'KCP Tebet, Jakarta Selatan',
                'alamat_cabang' => 'Jl. Tebet Timur Dalam Raya, Tebet, Jakarta Selatan, DKI Jakarta'
            ],
        ]);
    }
}
