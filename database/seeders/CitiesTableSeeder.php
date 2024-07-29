<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Aceh Barat', 'province_id' => 1],
            ['name' => 'Aceh Barat Daya', 'province_id' => 1],
            ['name' => 'Aceh Besar', 'province_id' => 1],
            ['name' => 'Aceh Jaya', 'province_id' => 1],
            ['name' => 'Aceh Selatan', 'province_id' => 1],
            ['name' => 'Aceh Singkil', 'province_id' => 1],
            ['name' => 'Aceh Tamiang', 'province_id' => 1],
            ['name' => 'Aceh Tengah', 'province_id' => 1],
            ['name' => 'Aceh Tenggara', 'province_id' => 1],
            ['name' => 'Aceh Timur', 'province_id' => 1],
            ['name' => 'Aceh Utara', 'province_id' => 1],
            ['name' => 'Bener Meriah', 'province_id' => 1],
            ['name' => 'Bireuen', 'province_id' => 1],
            ['name' => 'Gayo Lues', 'province_id' => 1],
            ['name' => 'Nagan Raya', 'province_id' => 1],
            ['name' => 'Pidie', 'province_id' => 1],
            ['name' => 'Pidie Jaya', 'province_id' => 1],
            ['name' => 'Simeulue', 'province_id' => 1],
            ['name' => 'Badung', 'province_id' => 2],
            ['name' => 'Bangli', 'province_id' => 2],
            ['name' => 'Buleleng', 'province_id' => 2],
            ['name' => 'Gianyar', 'province_id' => 2],
            ['name' => 'Jembrana', 'province_id' => 2],
            ['name' => 'Karangasem', 'province_id' => 2],
            ['name' => 'Klungkung', 'province_id' => 2],
            ['name' => 'Tabanan', 'province_id' => 2],
            ['name' => 'Bangka', 'province_id' => 3],
            ['name' => 'Belitung', 'province_id' => 3],
            ['name' => 'Belitung Timur', 'province_id' => 3],
            ['name' => 'Bangka Barat', 'province_id' => 3],
            ['name' => 'Bangka Selatan', 'province_id' => 3],
            ['name' => 'Bangka Tengah', 'province_id' => 3],
            ['name' => 'Banten', 'province_id' => 4],
            ['name' => 'Cilegon', 'province_id' => 4],
            ['name' => 'Lebak', 'province_id' => 4],
            ['name' => 'Pandeglang', 'province_id' => 4],
            ['name' => 'Serang', 'province_id' => 4],
            ['name' => 'Tangerang', 'province_id' => 4],
            ['name' => 'Tangerang Selatan', 'province_id' => 4],
            ['name' => 'Bengkulu', 'province_id' => 5],
            ['name' => 'Bengkulu Selatan', 'province_id' => 5],
            ['name' => 'Bengkulu Tengah', 'province_id' => 5],
            ['name' => 'Bengkulu Utara', 'province_id' => 5],
            ['name' => 'Kaur', 'province_id' => 5],
            ['name' => 'Kepahiang', 'province_id' => 5],
            ['name' => 'Lebong', 'province_id' => 5],
            ['name' => 'Mukomuko', 'province_id' => 5],
            ['name' => 'Rejang Lebong', 'province_id' => 5],
            ['name' => 'Seluma', 'province_id' => 5],
            ['name' => 'Boalemo', 'province_id' => 6],
            ['name' => 'Bone Bolango', 'province_id' => 6],
            ['name' => 'Gorontalo', 'province_id' => 6],
            ['name' => 'Gorontalo Utara', 'province_id' => 6],
            ['name' => 'Pohuwato', 'province_id' => 6],
            ['name' => 'Jakarta Barat', 'province_id' => 7],
            ['name' => 'Jakarta Pusat', 'province_id' => 7],
            ['name' => 'Jakarta Selatan', 'province_id' => 7],
            ['name' => 'Jakarta Timur', 'province_id' => 7],
            ['name' => 'Jakarta Utara', 'province_id' => 7],
            ['name' => 'Denpasar', 'province_id' => 2],
            ['name' => 'Blitar', 'province_id' => 11],
            ['name' => 'Kediri', 'province_id' => 11],
            ['name' => 'Madiun', 'province_id' => 11],
            ['name' => 'Malang', 'province_id' => 11],
            ['name' => 'Mojokerto', 'province_id' => 11],
            ['name' => 'Pasuruan', 'province_id' => 11],
            ['name' => 'Probolinggo', 'province_id' => 11],
            ['name' => 'Surabaya', 'province_id' => 11],
            // Tambahkan data kota lainnya sesuai dengan provinsi yang ada
        ]);
    }
}
