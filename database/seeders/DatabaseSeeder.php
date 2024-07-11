<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Category::create([
            'category' => 'cap',
            'is_accessible' => 1
        ]);
        Category::create([
            'category' => 'hoodie',
            'is_accessible' => 1
        ]);
        Category::create([
            'category' => 't-shirt',
            'is_accessible' => 1
        ]);
        Category::create([
            'category' => 'skateboard',
            'is_accessible' => 1
        ]);
        Category::create([
            'category' => 'wheel',
            'is_accessible' => 1
        ]);

        Color::create([
            'color' => 'black',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'blue',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'green',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'grey',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'pink',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'purple',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'red',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'white',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'yellow',
            'is_accessible' => 1
        ]);
        Color::create([
            'color' => 'multi',
            'is_accessible' => 1
        ]);

        Product::create([
            'category_id' => 1,
            'color_id' => 2,
            'title' => 'cap',
            'description' => 'Cap with Sinus logo',
            'image' => 'sinus-cap-blue.png',
            'price' => 5,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 1,
            'color_id' => 3,
            'title' => 'cap',
            'description' => 'Cap with Sinus logo',
            'image' => 'sinus-cap-green.png',
            'price' => 5,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 1,
            'color_id' => 6,
            'title' => 'cap',
            'description' => 'Cap with Sinus logo',
            'image' => 'sinus-cap-purple.png',
            'price' => 5,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 2,
            'color_id' => 2,
            'title' => 'hoodie',
            'description' => 'Hoodie with Sinus logo',
            'image' => 'sinus-hoodie-blue.png',
            'price' => 20,
            'stock' => 10,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 2,
            'color_id' => 3,
            'title' => 'hoodie',
            'description' => 'Hoodie with Sinus logo',
            'image' => 'sinus-hoodie-green.png',
            'price' => 20,
            'stock' => 10,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 2,
            'color_id' => 4,
            'title' => 'hoodie',
            'description' => 'Hoodie with Sinus logo',
            'image' => 'sinus-hoodie-grey.png',
            'price' => 20,
            'stock' => 10,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 2,
            'color_id' => 6,
            'title' => 'hoodie',
            'description' => 'Hoodie with Sinus logo',
            'image' => 'sinus-hoodie-purple.png',
            'price' => 20,
            'stock' => 10,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 3,
            'color_id' => 2,
            'title' => 't-shirt',
            'description' => 'T-shirt with Sinus logo',
            'image' => 'sinus-tshirt-blue.png',
            'price' => 10,
            'stock' => 15,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 3,
            'color_id' => 4,
            'title' => 't-shirt',
            'description' => 'T-shirt with Sinus logo',
            'image' => 'sinus-tshirt-grey.png',
            'price' => 10,
            'stock' => 20,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 3,
            'color_id' => 5,
            'title' => 't-shirt',
            'description' => 'T-shirt with Sinus logo',
            'image' => '',
            'price' => 10,
            'stock' => 15,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 3,
            'color_id' => 6,
            'title' => 't-shirt',
            'description' => 'T-shirt with Sinus logo',
            'image' => 'sinus-tshirt-purple.png',
            'price' => 10,
            'stock' => 20,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 3,
            'color_id' => 9,
            'title' => 't-shirt',
            'description' => 'T-shirt with Sinus logo',
            'image' => 'sinus-tshirt-yellow.png',
            'price' => 10,
            'stock' => 15,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with eagle print',
            'image' => 'sinus-skateboard-eagle.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with flames print',
            'image' => 'sinus-skateboard-fire.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with angry Greta Thunberg picture',
            'image' => 'sinus-skateboard-gretasfury.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with black ink print',
            'image' => 'sinus-skateboard-ink.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with Sinus logo',
            'image' => 'sinus-skateboard-logo.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with Northern Lights print',
            'image' => 'sinus-skateboard-northern_lights.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with multicolor print',
            'image' => 'sinus-skateboard-plastic.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 0
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 10,
            'title' => 'Skateboard',
            'description' => 'Skateboard with polar bear print',
            'image' => 'sinus-skateboard-polar.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 6,
            'title' => 'Skateboard',
            'description' => 'Skateboard with Sinus logo',
            'image' => 'sinus-skateboard-purple.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 4,
            'color_id' => 9,
            'title' => 'Skateboard',
            'description' => 'Skateboard with Sinus logo',
            'image' => 'sinus-skateboard-yellow.png',
            'price' => 30,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 5,
            'color_id' => 1,
            'title' => 'Wheel',
            'description' => 'Skateboard wheels with black waves (4/pack)',
            'image' => 'sinus-wheel-black.png',
            'price' => 10,
            'stock' => 5,
            'is_accessible' => 1
        ]);
        Product::create([
            'category_id' => 5,
            'color_id' => 8,
            'title' => 'Wheel',
            'description' => 'Skateboard wheels, pure white (4/pack)',
            'image' => 'sinus-wheel-white.png',
            'price' => 10,
            'stock' => 5,
            'is_accessible' => 1
        ]);

        Role::create([
            'role' => 'admin',
            'is_accessible' => 1
        ]);
        Role::create([
            'role' => 'user',
            'is_accessible' => 1
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'admin',
            'address' => 'Sinus grove 1',
            'zip' => '111 11',
            'city' => 'Sinusville',
            'phone' => '070-1111111',
            'email' => 'admin@sinus.se',
            'password' => bcrypt('admin'),
            'is_accessible' => 1,
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'user',
            'address' => 'Sinus street 1',
            'zip' => '111 11',
            'city' => 'Sinusville',
            'phone' => '070-2222222',
            'email' => 'user@sinus.se',
            'password' => bcrypt('user'),
            'is_accessible' => 1,
        ]);

        Cart::create([
            'user_id' => '1',
            'session_id' => '',
            'total_sum' => '5',
            'is_accessible' => 0,
        ]);
        Cart::create([
            'user_id' => '2',
            'session_id' => '',
            'total_sum' => '30',
            'is_accessible' => 0,
        ]);
        Cart::create([
            'user_id' => '1',
            'session_id' => '',
            'total_sum' => '20',
            'is_accessible' => 1,
        ]);
        Cart::create([
            'user_id' => '2',
            'session_id' => '',
            'total_sum' => '80',
            'is_accessible' => 1,
        ]);

        CartDetail::create([
            'cart_id' => '1',
            'product_id' => '1',
            'quantity' => 1,
            'is_accessible' => 0,
        ]);
        CartDetail::create([
            'cart_id' => '2',
            'product_id' => '1',
            'quantity' => 2,
            'is_accessible' => 0,
        ]);
        CartDetail::create([
            'cart_id' => '2',
            'product_id' => '2',
            'quantity' => 2,
            'is_accessible' => 0,
        ]);
        CartDetail::create([
            'cart_id' => '2',
            'product_id' => '3',
            'quantity' => 2,
            'is_accessible' => 0,
        ]);
        CartDetail::create([
            'cart_id' => '3',
            'product_id' => '4',
            'quantity' => 1,
            'is_accessible' => 1,
        ]);
        CartDetail::create([
            'cart_id' => '4',
            'product_id' => '4',
            'quantity' => 2,
            'is_accessible' => 1,
        ]);
        CartDetail::create([
            'cart_id' => '4',
            'product_id' => '5',
            'quantity' => 2,
            'is_accessible' => 1,
        ]);

        Order::create([
            'user_id' => '1',
            'cart_id' => '1',
            'total_sum' => '5',
            'is_accessible' => 1,
        ]);
        Order::create([
            'user_id' => '2',
            'cart_id' => '2',
            'total_sum' => '30',
            'is_accessible' => 1,
        ]);

        OrderDetail::create([
            'order_id' => '1',
            'product_id' => '1',
            'quantity' => 1,
            'is_accessible' => 1,
        ]);
        OrderDetail::create([
            'order_id' => '2',
            'product_id' => '1',
            'quantity' => 2,
            'is_accessible' => 1,
        ]);
        OrderDetail::create([
            'order_id' => '2',
            'product_id' => '2',
            'quantity' => 2,
            'is_accessible' => 1,
        ]);
        OrderDetail::create([
            'order_id' => '2',
            'product_id' => '3',
            'quantity' => 2,
            'is_accessible' => 1,
        ]);
    }
}
