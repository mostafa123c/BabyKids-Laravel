<?php

namespace Database\Seeders;

use App\Models\course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses =[
            ['name'=>'php course' , 'price'=>'2000' , 'description'=>'web development' ,'image'=> 'php.png'],
            ['name'=>'ml course' , 'price'=>'1500' , 'description'=>'development' ,'image'=> 'ml.png'],
            ['name'=>'iot course' , 'price'=>'500' , 'description'=>'network communication' ,'image'=> 'iot.png'],
        ];

        foreach ($courses as $course)
        {
            course::create([
                'name' => $course['name'],
                'price' => $course['price'],
                'description' => $course['description'],
                'image' => $course['image'],
            ]);

        }
    }
}
