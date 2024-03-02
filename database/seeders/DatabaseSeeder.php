<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('program')->insert([
            'no_rekening' => '1234567890',
            'nama_program' => 'Program 1',
            'tahun' => 2024,
        ]);

        DB::table('indikator_program')->insert([
            'program_id' => 1,
            'indikator' => 'Indikator 1',
            'target' => 100,
            'satuan' => 'orang',
            'pagu' => 1000000,
        ]);

        DB::table('kegiatan')->insert([
            'program_id' => 1,
            'no_rekening' => '1234567890',
            'nama_kegiatan' => 'Kegiatan 1',
        ]);

        DB::table('indikator_kegiatan')->insert([
            'kegiatan_id' => 1,
            'indikator' => 'Indikator 1',
            'target' => 100,
            'satuan' => 'orang',
            'pagu' => 1000000,
        ]);

        DB::table('bidang')->insert([
            [
                'nama_bidang' => 'Bidang 1',
            ],
            [
                'nama_bidang' => 'Bidang 2',
            ]
        ]);

        DB::table('subkegiatan')->insert([
            'kegiatan_id' => 1,
            'bidang_id' => 1,
            'no_rekening' => '1234567890',
            'nama_subkegiatan' => 'Subkegiatan 1',
            'tahun' => 2024,
        ]);

        DB::table('kinerja')->insert([
            'subkegiatan_id' => 1,
            'indikator' => 'Indikator 1',
            'target' => 100,
            'satuan' => 'orang',
            'pagu' => 1000000,
        ]);

        DB::table('realisasi')->insert([
            [
                'kinerja_id' => 1,
                'triwulan' => 1,
                'kinerja' => 100,
                'satuan' => 'orang',
                'realisasi_anggaran' => 1000000,
                'faktor_pendorong' => 'Sesuai',
                'faktor_penghambat' => 'Tidak ada',
                'masalah' => 'Tidak ada',
                'solusi' => 'Tidak ada',
            ],
            [
                'kinerja_id' => 1,
                'triwulan' => 2,
                'kinerja' => 100,
                'satuan' => 'orang',
                'realisasi_anggaran' => 1000000,
                'faktor_pendorong' => 'Sesuai',
                'faktor_penghambat' => 'Tidak ada',
                'masalah' => 'Tidak ada',
                'solusi' => 'Tidak ada',
            ]
        ]);
    }
}
