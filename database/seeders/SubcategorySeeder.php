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
                'name' => 'Acción',
                'slug' => Str::slug('Acción'),
            ],

            [
                'category_id' => 1,
                'name' => 'Aventura',
                'slug' => Str::slug('Aventura'),
            ],

            [
                'category_id' => 1,
                'name' => 'Arcade',
                'slug' => Str::slug('Arcade'),
            ],
            
            [
                'category_id' => 1,
                'name' => 'Deportes',
                'slug' => Str::slug('Deportes'),
            ],

            [
                'category_id' => 1,
                'name' => 'Estrategias',
                'slug' => Str::slug('Estrategias'),
            ],


            /* Nintendo 3DS*/

            [
                'category_id' => 2,
                'name' => 'Acción',
                'slug' => Str::slug('Acción'),
            ],

            [
                'category_id' => 2,
                'name' => 'Aventura',
                'slug' => Str::slug('Aventura'),
            ],

            [
                'category_id' => 2,
                'name' => 'Arcade',
                'slug' => Str::slug('Arcade'),
            ],
            
            [
                'category_id' => 2,
                'name' => 'Deportes',
                'slug' => Str::slug('Deportes'),
            ],

            [
                'category_id' => 2,
                'name' => 'Estrategias',
                'slug' => Str::slug('Estrategias'),
            ],

            /* Nintendo Wii U*/

            [
                'category_id' => 3,
                'name' => 'Acción',
                'slug' => Str::slug('Acción'),
            ],

            [
                'category_id' => 3,
                'name' => 'Aventura',
                'slug' => Str::slug('Aventura'),
            ],

            [
                'category_id' => 3,
                'name' => 'Arcade',
                'slug' => Str::slug('Arcade'),
            ],
            
            [
                'category_id' => 3,
                'name' => 'Deportes',
                'slug' => Str::slug('Deportes'),
            ],

            [
                'category_id' => 3,
                'name' => 'Estrategias',
                'slug' => Str::slug('Estrategias'),
            ],

            /* Nintendo Switch*/

            [
                'category_id' => 4,
                'name' => 'Acción',
                'slug' => Str::slug('Acción'),
            ],

            [
                'category_id' => 4,
                'name' => 'Aventura',
                'slug' => Str::slug('Aventura'),
            ],

            [
                'category_id' => 4,
                'name' => 'Arcade',
                'slug' => Str::slug('Arcade'),
            ],
            
            [
                'category_id' => 4,
                'name' => 'Deportes',
                'slug' => Str::slug('Deportes'),
            ],

            [
                'category_id' => 4,
                'name' => 'Estrategias',
                'slug' => Str::slug('Estrategias'),
            ],

            /* PlayStation*/

            [
                'category_id' => 5,
                'name' => 'Acción',
                'slug' => Str::slug('Acción'),
            ],

            [
                'category_id' => 5,
                'name' => 'Aventura',
                'slug' => Str::slug('Aventura'),
            ],

            [
                'category_id' => 5,
                'name' => 'Arcade',
                'slug' => Str::slug('Arcade'),
            ],
            
            [
                'category_id' => 5,
                'name' => 'Deportes',
                'slug' => Str::slug('Deportes'),
            ],

            [
                'category_id' => 5,
                'name' => 'Estrategias',
                'slug' => Str::slug('Estrategias'),
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
