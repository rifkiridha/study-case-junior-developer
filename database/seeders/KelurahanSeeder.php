<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
        $jsonFilePath = storage_path('app/public/json/kelurahan.json');

        if (!File::exists($jsonFilePath)) {
            $this->command->error('File not found: ' . $jsonFilePath);
            return;
        }

        $json = File::get($jsonFilePath);
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('kelurahan')->updateOrInsert(
                ['id' => $item['id']], 
                [
                    'kecamatan_id' => $item['subdistrict_id'],
                    'nama_kelurahan' => $item['name'],
                ]
            );
        }
    }
}
