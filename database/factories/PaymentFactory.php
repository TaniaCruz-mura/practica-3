<?php
namespace Database\Factories;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory {
    public function definition(): array {
        $status = $this->faker->randomElement(['pending','completed','failed']);
        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'method'   => $this->faker->randomElement(['cash','card','transfer']),
            'amount'   => $this->faker->randomFloat(2, 50, 2000),
            'status'   => $status,
            'paid_at'  => $status === 'completed' ? $this->faker->dateTimeBetween('-3 months','now') : null,
        ];
    }
}
