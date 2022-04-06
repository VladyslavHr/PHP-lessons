<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\{Group,User,Post,Product};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['email' => 'admin@admin.com'],[
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            // 'phone' => '+380676104287',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'avatar' => '/images/cat.jpg',
        ]);
        User::factory(10)->create();
        Group::factory(10)->create();
        Post::factory(100)->create();
        Product::factory(100)->create();
    }
}
