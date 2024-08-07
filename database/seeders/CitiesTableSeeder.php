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
            
            ['name' => 'Jambi', 'province_id' => 8],
    ['name' => 'Sungai Penuh', 'province_id' => 8],

    // Jawa Barat
    ['name' => 'Bandung', 'province_id' => 9],
    ['name' => 'Bogor', 'province_id' => 9],
    ['name' => 'Bekasi', 'province_id' => 9],
    ['name' => 'Depok', 'province_id' => 9],
    ['name' => 'Cirebon', 'province_id' => 9],

    // Jawa Tengah
    ['name' => 'Semarang', 'province_id' => 10],
    ['name' => 'Surakarta', 'province_id' => 10],
    ['name' => 'Tegal', 'province_id' => 10],
    ['name' => 'Pekalongan', 'province_id' => 10],
    ['name' => 'Magelang', 'province_id' => 10],

    // Jawa Timur
    ['name' => 'Surabaya', 'province_id' => 11],
    ['name' => 'Malang', 'province_id' => 11],
    ['name' => 'Mojokerto', 'province_id' => 11],
    ['name' => 'Pasuruan', 'province_id' => 11],
    ['name' => 'Probolinggo', 'province_id' => 11],

    // Kalimantan Barat
    ['name' => 'Pontianak', 'province_id' => 12],
    ['name' => 'Singkawang', 'province_id' => 12],

    // Kalimantan Selatan
    ['name' => 'Banjarmasin', 'province_id' => 13],
    ['name' => 'Banjarbaru', 'province_id' => 13],

    // Kalimantan Tengah
    ['name' => 'Palangka Raya', 'province_id' => 14],

    // Kalimantan Timur
    ['name' => 'Samarinda', 'province_id' => 15],
    ['name' => 'Balikpapan', 'province_id' => 15],

    // Kalimantan Utara
    ['name' => 'Tarakan', 'province_id' => 16],

    // Kepulauan Riau
    ['name' => 'Tanjung Pinang', 'province_id' => 17],
    ['name' => 'Batam', 'province_id' => 17],

    // Lampung
    ['name' => 'Bandar Lampung', 'province_id' => 18],
    ['name' => 'Metro', 'province_id' => 18],

    // Maluku
    ['name' => 'Ambon', 'province_id' => 19],
    ['name' => 'Tual', 'province_id' => 19],

    // Maluku Utara
    ['name' => 'Ternate', 'province_id' => 20],
    ['name' => 'Tidore Kepulauan', 'province_id' => 20],

    // Nusa Tenggara Barat
    ['name' => 'Mataram', 'province_id' => 21],
    ['name' => 'Bima', 'province_id' => 21],

    // Nusa Tenggara Timur
    ['name' => 'Kupang', 'province_id' => 22],

    // Papua
    ['name' => 'Jayapura', 'province_id' => 23],
    ['name' => 'Timika', 'province_id' => 23],

    // Papua Barat
    ['name' => 'Manokwari', 'province_id' => 24],
    ['name' => 'Sorong', 'province_id' => 24],

    // Papua Barat Daya
    ['name' => 'Fakfak', 'province_id' => 25],

    // Papua Pegunungan
    ['name' => 'Wamena', 'province_id' => 26],

    // Papua Selatan
    ['name' => 'Merauke', 'province_id' => 27],

    // Papua Tengah
    ['name' => 'Nabire', 'province_id' => 28],

    // Riau
    ['name' => 'Pekanbaru', 'province_id' => 29],
    ['name' => 'Dumai', 'province_id' => 29],

    // Sulawesi Barat
    ['name' => 'Mamuju', 'province_id' => 30],

    // Sulawesi Selatan
    ['name' => 'Makassar', 'province_id' => 31],
    ['name' => 'Parepare', 'province_id' => 31],

    // Sulawesi Tengah
    ['name' => 'Palu', 'province_id' => 32],

    // Sulawesi Tenggara
    ['name' => 'Kendari', 'province_id' => 33],
    ['name' => 'Bau-Bau', 'province_id' => 33],

    // Sulawesi Utara
    ['name' => 'Manado', 'province_id' => 34],
    ['name' => 'Bitung', 'province_id' => 34],

    // Sumatra Barat
    ['name' => 'Padang', 'province_id' => 35],
    ['name' => 'Bukittinggi', 'province_id' => 35],

    // Sumatra Selatan
    ['name' => 'Palembang', 'province_id' => 36],
    ['name' => 'Prabumulih', 'province_id' => 36],

    // Sumatra Utara
    ['name' => 'Medan', 'province_id' => 37],
    ['name' => 'Binjai', 'province_id' => 37],

    // Yogyakarta
    ['name' => 'Yogyakarta', 'province_id' => 38],
    ['name' => 'Bantul', 'province_id' => 38],
    ['name' => 'Sleman', 'province_id' => 38],
    ['name' => 'Gunung Kidul', 'province_id' => 38],
    ['name' => 'Kulon Progo', 'province_id' => 38]
            // Tambahkan data kota lainnya sesuai dengan provinsi yang ada
        ]);
    }
}