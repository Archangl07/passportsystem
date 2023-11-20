<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {

            Application::create([
                'user_id' => 4,
                'document_id' => 1,
                'application_date' => $faker->date(),
                'application_no' => $faker->uuid,
                'allocated_passport_number' => $faker->numberBetween(1000000, 9999999),
                'service_type' => $faker->word,
                'traveldocument_type' => $faker->word,
                'present_traveldocument_no' => $faker->uuid,
                'nmrp_no' => $faker->uuid,
                'nic_no' => $faker->numberBetween(1000000, 9999999),
                'district' => $faker->word,
                'dateofbirth' => $faker->date(),
                'bc_number' => $faker->uuid,
                'bc_district' => $faker->word,
                'birth_place' => $faker->word,
                'sex' => $faker->randomElement(['Male', 'Female']),
                'occupation' => $faker->word,
                'dual_citizenship' => $faker->boolean,
                'dual_citizenship_no' => $faker->uuid,
                'applicant_signature' => $faker->word,
                'status' => $faker->randomElement(['pending', 'approved', 'rejected']),
            ]);
        }
    }
}
