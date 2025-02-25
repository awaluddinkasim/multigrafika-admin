<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Sticker;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Sticker::factory(10)->create();

        Order::factory(10)->create()->each(function ($order) {
            $order->user()->associate(User::factory()->create());
            $order->sticker()->associate(Sticker::factory()->create());
        });

        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example',
            'password' => bcrypt('password'),
        ]);
    }
}
