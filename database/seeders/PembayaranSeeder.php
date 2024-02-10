<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idSpp = DB::table('spps')->insertGetId([
            "id_spp" => random_int(1, 20),
            "tahun" => random_int(2000, 2006),
            "nominal" => random_int(1000000, 5000000),
        ]);

        $idKelas = DB::table('kelases')->insertGetId([
            "id_kelas" => random_int(1, 20),
            "nama_kelas" => Str::random(10),
            "kompetensi_keahlian" => Str::random(50)
        ]);

        $petugasID = DB::table('petugases')->insertGetId([
            "id_petugas" => "01",
            "username" => "raissa",
            "password" => substr(md5("raissa"), 0, 32),
            "nama_petugas" => "Raissa Fadhillah",
            "level" => "admin",
        ]);

        $nisn = DB::table('siswas')->insertGetId([
            "nisn" => "0065494849",
            "nis" => "22231755",
            "nama" => "Raissa Fadhillah",
            "id_kelas" => $idKelas,
            "alamat" => "Karawang",
            "no_telp" => "085157996915",
            "id_spp" => $idSpp,
        ]);

        DB::table('pembayarans')->insert([
            "id_pembayaran" => random_int(1, 20),
            "id_petugas" => "01",
            "nisn" => "0065494849",
            "tgl_bayar" => now(),
            "bulan_dibayar" => random_int(1, 12),
            "tahun_dibayar" => date("Y") + random_int(-1, 1),
            "id_spp" => $idSpp,
            "jumlah_bayar" => random_int(100000, 5000000),
        ]);
    }
}
