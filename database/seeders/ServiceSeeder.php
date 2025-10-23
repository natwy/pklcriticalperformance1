<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'nama_jasa' => 'Remap ECU Honda',
            'deskripsi' => 'Optimasi performa mesin Honda agar lebih responsif dan efisien.',
            'harga' => 750000,
            'gambar' => 'images/remap-honda.jpg',
        ]);

        Service::create([
            'nama_jasa' => 'Servis Berkala',
            'deskripsi' => 'Servis rutin untuk menjaga kondisi mesin tetap prima.',
            'harga' => 300000,
            'gambar' => 'images/servis-berkala.jpg',
        ]);
    }
}
