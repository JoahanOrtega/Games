<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            /* Xbox */

            [
                'category_id' => 1,
                'name' => 'Aventura',
            ],

            [
                'category_id' => 1,
                'name' => 'Arcade',
            ],
            
            [
                'category_id' => 1,
                'name' => 'Deportes',
            ],

            [
                'category_id' => 1,
                'name' => 'Estrategias',
            ],


            /* Nintendo 3DS*/
            
            [
                'category_id' => 2,
                'name' => 'Deportes',
            ],

            [
                'category_id' => 2,
                'name' => 'Estrategias',
            ],

            /* Nintendo Wii U*/

            [
                'category_id' => 3,
                'name' => 'Acción',
            ],

            [
                'category_id' => 3,
                'name' => 'Aventura',
            ],

            [
                'category_id' => 3,
                'name' => 'Arcade',
            ],
            
            [
                'category_id' => 3,
                'name' => 'Deportes',
            ],

            [
                'category_id' => 3,
                'name' => 'Estrategias',
            ],

            /* Nintendo Switch*/

            [
                'category_id' => 4,
                'name' => 'Acción',
            ],

            [
                'category_id' => 4,
                'name' => 'Aventura',
            ],

            [
                'category_id' => 4,
                'name' => 'Arcade',
            ],

            /* PlayStation*/

            [
                'category_id' => 5,
                'name' => 'Acción',
            ],

            [
                'category_id' => 5,
                'name' => 'Aventura',
            ],

            [
                'category_id' => 5,
                'name' => 'Arcade',
            ],

            [
                'category_id' => 5,
                'name' => 'Estrategias',
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
