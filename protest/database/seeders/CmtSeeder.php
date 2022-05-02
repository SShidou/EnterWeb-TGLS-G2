<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CmtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_y = Carbon::yesterday();
        $date = Carbon::now();
        Comment::create([
            'user_id' => '1',
            'post_id' => '1',
            'writer' => 'Admin1',
            'comment' => 'txt cmt 01',
            'created_at'=> $date_y,
        ]); // Cmt 1 - pagination
        Comment::create([
            'user_id' => '1',
            'post_id' => '1',
            'writer' => 'anonymous',
            'comment' => 'txt cmt 02',
            'created_at'=> $date_y,
        ]); // Cmt 2
        Comment::create([
            'user_id' => '5',
            'post_id' => '1',
            'writer' => 'userBeta',
            'comment' => 'txt cmt 03',
            'created_at'=> $date,
        ]); // Cmt 3
        Comment::create([
            'user_id' => '4',
            'post_id' => '1',
            'writer' => 'anonymous',
            'comment' => 'txt cmt 04',
            'created_at'=> $date,
        ]); // Cmt 4
        Comment::create([
            'user_id' => '1',
            'post_id' => '2',
            'writer' => 'anonymous',
            'comment' => 'txt cmt 05 on another post',
            'created_at'=> $date_y,
        ]); // Cmt 5
    }
}
