<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            KantorCabangSeeder::class,
            UsersSeeder::class,
            PekerjaanSeeder::class,
            ProvinsiSeeder::class,
            KabKotaSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
        ]);
    }
}
