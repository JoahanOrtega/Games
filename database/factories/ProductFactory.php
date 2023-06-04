<?php

namespace Database\Factories;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence(2);

        $subcategory = Subcategory::all()->random();

        return [
            'name' => $name,
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99,49.99,99.99]),
            'subcategory_id' => $subcategory->id,
            'quantity' => 15,
            'status' => 2
        ];
    }
}
