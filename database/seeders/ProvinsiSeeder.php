<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProvinsiSeeder extends Seeder
{
    public function run()
    {
        $jsonFilePath = storage_path('app/public/json/provinsi.json');

        if (!File::exists($jsonFilePath)) {
            $this->command->error('File not found: ' . $jsonFilePath);
            return;
        }

        $json = File::get($jsonFilePath);
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('provinsi')->updateOrInsert(
                ['id' => $item['id']],
                ['nama_provinsi' => $item['name'],]
            );
        }
    }
}
