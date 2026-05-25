<?php
namespace Database\Seeders;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        // 1. Categorias (5)
        Category::factory(5)->create();

        // 2. Productos (20 activos + 3 inactivos)
        Product::factory(20)->create();
        Product::factory(3)->inactive()->create();

        // 3. Clientes (10)
        Customer::factory(10)->create();

        // 4. Pedidos (15)
        Order::factory(15)->create();

        // 5. OrderItems — 2 a 4 items por pedido
        Order::all()->each(function ($order) {
            $products = Product::where('active', true)->inRandomOrder()->take(rand(2, 4))->get();
            foreach ($products as $product) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'quantity'   => rand(1, 5),
                    'unit_price' => $product->price,
                ]);
            }
        });

        // 6. Pagos — uno por pedido
        Order::all()->each(function ($order) {
            Payment::create([
                'order_id' => $order->id,
                'method'   => collect(['cash','card','transfer'])->random(),
                'amount'   => $order->total,
                'status'   => collect(['pending','completed','failed'])->random(),
                'paid_at'  => now(),
            ]);
        });
    }
}
