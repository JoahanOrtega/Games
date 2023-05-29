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
                'slug' => Str::slug('Xbox One'),
                'icon' => '<i class="fa-brands fa-xbox"></i>'
            ],

            [
                'name' => 'Nintendo 3DS',
                'slug' => Str::slug('Nintendo 3DS'),
                'icon' => '<i class="fa-solid fa-alien-8bit"></i>'
            ],

            [
                'name' => 'Wii U',
                'slug' => Str::slug('Wii U'),
                'icon' => '<i class="fa-sharp fa-regular fa-joystick"></i>'
            ],

            [
                'name' => 'Nintendo Switch',
                'slug' => Str::slug('Nintendo Switch'),
                'icon' => '<i class="fa-duotone fa-game-console-handheld"></i>'
            ],

            [
                'name' => 'PlayStation',
                'slug' => Str::slug('PlayStation'),
                'icon' => '<i class="fa-brands fa-playstation"></i>'
            ],
        ];
        foreach($categories as $category){
            
            $category = Category::factory(1)->create($category)->first();

            // $brands = Brand::factory(1)->create();

            // foreach ($brands as $brand) {
            //     $brand->categories()->attach($category->id);
            // }
        }
    }
}
