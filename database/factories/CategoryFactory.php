<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory {
    public function definition(): array {
        $name = $this->faker->unique()->randomElement([
            'Electrónica', 'Ropa', 'Alimentos', 'Libros', 'Deportes',
            'Hogar', 'Juguetes', 'Belleza', 'Herramientas', 'Automotriz'
        ]);
        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'description' => $this->faker->sentence(),
        ];
    }
}
