<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('jp_JP');

        for($i = 1; $i <= 30; $i++){

            Mahasiswa::create([
                'nama' => $faker->name,
                'nim' =>  $faker->buildingNumber,
                'alamat' => $faker->address
    
            ]);

        }
        
    }
}
