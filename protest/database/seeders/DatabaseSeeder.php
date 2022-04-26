<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        // $this->call(CmtSeeder::class);
        // $this->call(LikeSeeder::class);
        // $this->call(DislikeSeeder::class);
    }
}
