<?php
namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    public function definition(): array {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
 'name'        => $this->faker->words(3, true),
            'sku'         => strtoupper($this->faker->unique()->bothify('SKU-####-??')),
            'description' => $this->faker->paragraph(),
            'price'       => $this->faker->randomFloat(2, 10, 500),
            'stock'       => $this->faker->numberBetween(0, 100),
            'active'      => true,
        ];
    }
    public function inactive(): static {
        return $this->state(fn (array $attributes) => [
            'active' => false,
            'stock'  => 0,
        ]);
    }
}


