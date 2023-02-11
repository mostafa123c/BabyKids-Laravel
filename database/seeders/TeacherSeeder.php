<?php

namespace Database\Seeders;

use App\Models\teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        teacher::create([
            'name' => 'omda',
            'description' =>'specialized at back end' ,
            'image' => 'omda.png',
            'course_id' => '1',
        ]);
    }
}
