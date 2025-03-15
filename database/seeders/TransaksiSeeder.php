<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksis')->insert([
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-01 00:00:00'],
        ]);
        Barang::find(1)->update(['stok' => 90]);


        DB::table('transaksis')->insert([
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],

            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-05 00:00:00'],
        ]);
        Barang::find(2)->update(['stok' => 81]);


        DB::table('transaksis')->insert([
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],

            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
            ['barang_id' => 1, 'created_at' => '2021-05-10 00:00:00'],
        ]);
        Barang::find(1)->update(['stok' => 75]);

        DB::table('transaksis')->insert([
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],

            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 3, 'created_at' => '2021-05-11 00:00:00'],
        ]);
        Barang::find(3)->update(['stok' => 80]);


        DB::table('transaksis')->insert([
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],

            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],

            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
            ['barang_id' => 4, 'created_at' => '2021-05-11 00:00:00'],
        ]);
        Barang::find(4)->update(['stok' => 70]);

        DB::table('transaksis')->insert([
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],

            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],

            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 5, 'created_at' => '2021-05-12 00:00:00'],
        ]);
        Barang::find(5)->update(['stok' => 75]);

        DB::table('transaksis')->insert([
            ['barang_id' => 2, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-12 00:00:00'],
            ['barang_id' => 2, 'created_at' => '2021-05-12 00:00:00'],
        ]);
        Barang::find(2)->update(['stok' => 76]);
    }
}
