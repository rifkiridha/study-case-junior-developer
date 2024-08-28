<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $jsonFilePath = storage_path('app/public/json/kecamatan.json');

        if (!File::exists($jsonFilePath)) {
            $this->command->error('File not found: ' . $jsonFilePath);
            return;
        }

        $json = File::get($jsonFilePath);
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('kecamatan')->updateOrInsert(
                ['id' => $item['id']], 
                [
                    'kab_kota_id' => $item['id_district'], // Make sure the foreign key matches the 'kab_kota' table
                    'nama_kecamatan' => $item['name'],
                ]
            );
        }
    }
}
