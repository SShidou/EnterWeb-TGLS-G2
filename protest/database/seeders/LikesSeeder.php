<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::create([
            'user_id' => '1',
            'post_id' => '1',
        ]);
        Like::create([
            'user_id' => '2',
            'post_id' => '3',
        ]);
        Like::create([
            'user_id' => '3',
            'post_id' => '2',
        ]);
        Like::create([
            'user_id' => '4',
            'post_id' => '1',
        ]);
        Like::create([
            'user_id' => '5',
            'post_id' => '1',
        ]);
        Like::create([
            'user_id' => '5',
            'post_id' => '5',
        ]);
        Like::create([
            'user_id' => '1',
            'post_id' => '5',
        ]);
    }
}
