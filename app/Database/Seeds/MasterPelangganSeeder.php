<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MasterPelangganSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'no_pelanggan' => $faker->randomNumber(8),
                'nama_pelanggan' => $faker->name,
                'alamat_pelanggan' => $faker->address,
                'kota_pelanggan' => $faker->city,
                'nomor_telepon' => $faker->phoneNumber,
                'tipe' => $faker->randomNumber(3),
                'status_pelanggan' => "NO",
                'status_device' => "NO",
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];

            // Using Query Builder
            $this->db->table('master_pelanggan')->insert($data);
        }
    }
}
