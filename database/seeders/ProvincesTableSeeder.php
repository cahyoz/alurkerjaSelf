<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            ['id' => 1, 'name' => 'Aceh'],
            ['id' => 2, 'name' => 'Bali'],
            ['id' => 3, 'name' => 'Bangka Belitung'],
            ['id' => 4, 'name' => 'Banten'],
            ['id' => 5, 'name' => 'Bengkulu'],
            ['id' => 6, 'name' => 'Gorontalo'],
            ['id' => 7, 'name' => 'Jakarta'],
            ['id' => 8, 'name' => 'Jambi'],
            ['id' => 9, 'name' => 'Jawa Barat'],
            ['id' => 10, 'name' => 'Jawa Tengah'],
            ['id' => 11, 'name' => 'Jawa Timur'],
            ['id' => 12, 'name' => 'Kalimantan Barat'],
            ['id' => 13, 'name' => 'Kalimantan Selatan'],
            ['id' => 14, 'name' => 'Kalimantan Tengah'],
            ['id' => 15, 'name' => 'Kalimantan Timur'],
            ['id' => 16, 'name' => 'Kalimantan Utara'],
            ['id' => 17, 'name' => 'Kepulauan Riau'],
            ['id' => 18, 'name' => 'Lampung'],
            ['id' => 19, 'name' => 'Maluku'],
            ['id' => 20, 'name' => 'Maluku Utara'],
            ['id' => 21, 'name' => 'Nusa Tenggara Barat'],
            ['id' => 22, 'name' => 'Nusa Tenggara Timur'],
            ['id' => 23, 'name' => 'Papua'],
            ['id' => 24, 'name' => 'Papua Barat'],
            ['id' => 25, 'name' => 'Papua Barat Daya'],
            ['id' => 26, 'name' => 'Papua Pegunungan'],
            ['id' => 27, 'name' => 'Papua Selatan'],
            ['id' => 28, 'name' => 'Papua Tengah'],
            ['id' => 29, 'name' => 'Riau'],
            ['id' => 30, 'name' => 'Sulawesi Barat'],
            ['id' => 31, 'name' => 'Sulawesi Selatan'],
            ['id' => 32, 'name' => 'Sulawesi Tengah'],
            ['id' => 33, 'name' => 'Sulawesi Tenggara'],
            ['id' => 34, 'name' => 'Sulawesi Utara'],
            ['id' => 35, 'name' => 'Sumatra Barat'],
            ['id' => 36, 'name' => 'Sumatra Selatan'],
            ['id' => 37, 'name' => 'Sumatra Utara'],
            ['id' => 38, 'name' => 'Yogyakarta'],
        ]);
    }
}

