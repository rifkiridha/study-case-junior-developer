<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KabKotaSeeder extends Seeder
{
    public function run()
    {
        // Path to the JSON file
        $jsonFilePath = storage_path('app/public/json/kab_kota.json');

        // Check if the file exists
        if (!File::exists($jsonFilePath)) {
            $this->command->error('File not found: ' . $jsonFilePath);
            return;
        }

        // Read and decode JSON file
        $json = File::get($jsonFilePath);
        $data = json_decode($json, true);

        // Insert data into kab_kota table
        foreach ($data as $item) {
            DB::table('kab_kota')->updateOrInsert(
                ['id' => $item['id']],
                [
                    'provinsi_id' => $item['id_province'],
                    'nama_kab_kota' => $item['district'],
                ]
            );
        }
    }
}
