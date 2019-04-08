<?php

use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(); //import library faker

        $gender = $faker->randomElement(['Male', 'Female']);

        $limit = 5; //batasan berapa banyak data

        for ($i = 0; $i < $limit; $i++) {
            DB::table('karyawans')->insert([ //mengisi datadi database
                'nip' => $faker->randomNumber(8,true),
                'nama' => $faker->name($gender), //email unique sehingga tidak ada yang sama
                'tgl_lhr' => $faker->date,
                'jabatan' => 1,
                'asal' => $faker->city,
                'j_kel' => $gender,
                'alamat' => $faker->address,
                'no_tlp' => $faker->phoneNumber,
            ]);
        }
    }
}
