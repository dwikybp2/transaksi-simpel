<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'id' => 1,
                'nama' => 'Kopi',
                'stok' => 100,
                'jenis' => 'Konsumsi',
                'created_at' => '2021-05-01 00:00:00',
                'updated_at' => '2021-05-01 00:00:00',
            ],
            [
                'id' => 2,
                'nama' => 'Teh',
                'stok' => 100,
                'jenis' => 'Konsumsi',
                'created_at' => '2021-05-01 00:00:00',
                'updated_at' => '2021-05-01 00:00:00',
            ],
            [
                'id' => 3,
                'nama' => 'Pasta Gigi',
                'stok' => 100,
                'jenis' => 'Pembersih',
                'created_at' => '2021-05-01 00:00:00',
                'updated_at' => '2021-05-01 00:00:00',
            ],
            [
                'id' => 4,
                'nama' => 'Sabun Mandi',
                'stok' => 100,
                'jenis' => 'Pembersih',
                'created_at' => '2021-05-01 00:00:00',
                'updated_at' => '2021-05-01 00:00:00',
            ],
            [
                'id' => 5,
                'nama' => 'Sampo',
                'stok' => 100,
                'jenis' => 'Pembersih',
                'created_at' => '2021-05-01 00:00:00',
                'updated_at' => '2021-05-01 00:00:00',
            ],
        ]);
    }
}
