<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataHandle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['depar1'];
        $categories = ['cat1'];
        $items = ['item1'];

        for($i=0 ;$i<count($departments) ; $i++)
            {
                $department = Department::create([
                    'name' => $departments[$i]
                ]);

                $category = Category::create([
                    'name' => $categories[$i],
                    'department_id' => $department->id
                ]);

                 Item::create([
                    'name' => $items[$i],
                    'category_id' => $category->id
                ]);
            }
    }
}
