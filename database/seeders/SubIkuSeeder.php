<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubIkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_iku_tahun')->insert([
            [
                "tahun" => "2022"
            ],
            [
                "tahun" => "2023"
            ],
            [
                "tahun" => "2024"
            ],
            [
                "tahun" => "2025"
            ],
            [
                "tahun" => "2026"
            ],
        ]);

        DB::table('sub_iku')->insert([
            "misi_rpjmd" => "Mewujudkan inovasi pelayanan publik dan pembangunan kemandirian desa",
            "tujuan_rpjmd" => "Meningkatkan kinerja Pemerintah Daerah yang transaparan",
            "sasaran_rpjmd" => "Meningkatnya inovasi dan teknologi informasi",
            "tujuan_pd" => "Meningkatkan layanan informatika publik"
        ]);

        DB::table('sub_iku_sasaran')->insert([
            "sub_iku_id" => 1,
            "sasaran_pd" => "Meningkatnya akses jaringan internet di pedasaan",
            "indikator_tujuan" => "Presentase OPD dan Pemerintah Desa yang teraliri internet",
            "formula" => "121212.jpg",
            "angka_kinerja" => 93.12,
            "satuan" => "%"
        ]);

        DB::table('sub_iku_kinerja')->insert([
            [
                "sub_iku_sasaran_id" => 1,
                "sub_iku_tahun_id" => 1,
                "angka_kinerja" => 94.71,
                "satuan" => "%"
            ],
            [
                "sub_iku_sasaran_id" => 1,
                "sub_iku_tahun_id" => 2,
                "angka_kinerja" => 96.31,
                "satuan" => "%"
            ],
            [
                "sub_iku_sasaran_id" => 1,
                "sub_iku_tahun_id" => 3,
                "angka_kinerja" => 97.88,
                "satuan" => "%"
            ],
            [
                "sub_iku_sasaran_id" => 1,
                "sub_iku_tahun_id" => 4,
                "angka_kinerja" => 99.47,
                "satuan" => "%"
            ],
            [
                "sub_iku_sasaran_id" => 1,
                "sub_iku_tahun_id" => 5,
                "angka_kinerja" => 100,
                "satuan" => "%"
            ]
        ]);
    }
}
