<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      
        DB::table('bidang')->insert([
            [
                'nama_bidang' => 'Sekretariat',
               
            ],

            [
                'nama_bidang' => 'Infrastuktur TIK',
               
            ],

            [
                'nama_bidang' => 'Komunikasi',
               
            ],

            [
                'nama_bidang' => 'Persandian dan Aplikasi Informatika',
               
            ],

            [
                'nama_bidang' => 'Statistik',
               
            ],
           
        ]);
    }
}
