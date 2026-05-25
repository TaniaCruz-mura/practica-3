<?php
namespace Database\Factories;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory {
    public function definition(): array {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'status'      => $this->faker->randomElement(['pending','processing','completed','cancelled']),
            'total'       => $this->faker->randomFloat(2, 50, 2000),
            'notes'       => $this->faker->optional()->sentence(),
            'ordered_at'  => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
    public function completed(): static {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
        ]);
    }
    public function pending(): static {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }
}
