<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //array para insertar
        $categories = [
            [
                'name' => 'Xbox One',
            ],

            [
                'name' => 'Nintendo 3DS',
            ],

            [
                'name' => 'Wii U',
            ],

            [
                'name' => 'Nintendo Switch',
            ],

            [
                'name' => 'PlayStation',
            ],
        ];
        foreach($categories as $category){
            
            $category = Category::factory(1)->create($category)->first();
        }
    }
}
