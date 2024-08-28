<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $kantorCabangs = [
            'KCP Pondok Kelapa, Jakarta Timur',
            'KCP Cipulir, Jakarta Selatan',
            'KCP Jatibaru, Jakarta Pusat',
            'KCP Pasar Minggu, Jakarta Selatan',
            'KCP Kalimalang, Jakarta Timur',
            'KCP Otista, Jakarta Timur',
            'KCP Cikini, Jakarta Pusat',
            'KCP Pasar Rebo, Jakarta Timur',
            'KCP Tebet, Jakarta Selatan',
        ];

        foreach ($kantorCabangs as $index => $kantorCabang) {
            DB::table('users')->insert([
                'username' => "cs_user_{$index}",
                'password' => Hash::make('password'),
                'role' => 'Customer Service',
                'kantor_cabang_id' => $index + 1,
                'remember_token' => null,
            ]);

            DB::table('users')->insert([
                'username' => "supervisor_user_{$index}",
                'password' => Hash::make('password'),
                'role' => 'Supervisor',
                'kantor_cabang_id' => $index + 1,
                'remember_token' => null,
            ]);
        }
    }
}
