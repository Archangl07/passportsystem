<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\appointment;

class appointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       // Define the data for 10 records
       $data = [
        [
            'name' => 'John Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '123-456-7890',
            'branch' => 'Main Branch',
            'date' => now(),
            'message' => 'This is a sample message.',
            'status' => 'approved',
            'user_id' => 1,
        ],
        // Repeat the structure with different data for the other 9 records
        // ...

        // Example of the 10th record
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'Secondary Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'rejected',
            'user_id' => 1,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'Secondary Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'rejected',
            'user_id' => 1,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'Secondary Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'rejected',
            'user_id' => 1,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'Secondary Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'inprogress',
            'user_id' => 1,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'Secondary Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'inprogress',
            'user_id' => 1,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'Secondary Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'inprogress',
            'user_id' => 1,
        ],
        [
            'name' => 'John Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '123-456-7890',
            'branch' => 'Main Branch',
            'date' => now(),
            'message' => 'This is a sample message.',
            'status' => 'approved',
            'user_id' => 1,
        ],
        [
            'name' => 'John Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '123-456-7890',
            'branch' => 'Main Branch',
            'date' => now(),
            'message' => 'This is a sample message.',
            'status' => 'approved',
            'user_id' => 1,
        ],
        [
            'name' => 'John Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '123-456-7890',
            'branch' => 'Main Branch',
            'date' => now(),
            'message' => 'This is a sample message.',
            'status' => 'approved',
            'user_id' => 1,
        ],
        [
            'name' => 'John Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '123-456-7890',
            'branch' => 'Main Branch',
            'date' => now(),
            'message' => 'This is a sample message.',
            'status' => 'approved',
            'user_id' => 1,
        ],
        [
            'name' => 'John Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '123-456-7890',
            'branch' => 'Main Branch',
            'date' => now(),
            'message' => 'This is a sample message.',
            'status' => 'approved',
            'user_id' => 1,
        ],
        [
            'name' => 'John Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '123-456-7890',
            'branch' => 'Main Branch',
            'date' => now(),
            'message' => 'This is a sample message.',
            'status' => 'approved',
            'user_id' => 1,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'New Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'inprogress',
            'user_id' => 1,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'example123@yahoo.mail',
            'phone' => '987-654-3210',
            'branch' => 'New Branch',
            'date' => now(),
            'message' => 'Another sample message.',
            'status' => 'inprogress',
            'user_id' => 1,
        ],
    ];

    // Insert the data into the database
    DB::table('appointments')->insert($data);    
    }
}
