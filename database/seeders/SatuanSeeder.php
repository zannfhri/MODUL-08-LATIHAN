<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            [
                'kode_satuan' => 'PCS',
                'nama_satuan' => 'Pieces',
            ],
            [
                'kode_satuan' => 'UNT',
                'nama_satuan' => 'Unit',
            ],
            [
                'kode_satuan' => 'LSN',
                'nama_satuan' => 'Lusin',
            ],
        ]);
    }
}
