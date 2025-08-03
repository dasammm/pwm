<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MasterWilayahSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'kode_wilayah' => $faker->randomNumber(8),
                'nama_wilayah' => $faker->citySuffix,
                'kota' => $faker->city,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];

            // Using Query Builder
            $this->db->table('master_wilayah')->insert($data);
        }
    }
}
