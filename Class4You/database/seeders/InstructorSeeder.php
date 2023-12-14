<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Instructor;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instructor::create([
            'InstructorEmail' => 'admin@admin.com',
            'InstructorPassword' => Hash::make('admin1!'),
            'InstructorFullName' => '관리자',
            'InstructorPhoneNumber' => '01012345678',
        ]);
    }
}
