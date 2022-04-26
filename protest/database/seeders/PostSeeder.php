<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Note that the rename the file name = to the file name below!
    public function run()
    {
        $date_y = Carbon::yesterday();
        Post::create([
            'user_id' => '1',
            'category_id' => '1',
            'author' => 'adminuser',
            'content' => 'hello madafaqer!',
            #'image',
            'file' => 'uploads/aeW1Y2ZOQaJH6EZy57b8ePH8t93bfRkzu6Eud4FZ.docx',
            'created_at'=> $date_y,
        ]); // Post 1
        Post::create([
            'user_id' => '5',
            'category_id' => '3',
            'author' => 'staff',
            'content' => 'test content 2',
            #'image',
            'file' => 'uploads/JIaArew0HkXISRaGgX14p1IXCiwf1RFSl17yzLiD.pdf',
            'created_at'=> $date_y,
        ]); // Post 2
        Post::create([
            'user_id' => '2',
            'category_id' => '2',
            'author' => 'adminuser',
            'content' => 'text body 4',
            #'image',
            'file' => 'uploads/rqskBDWXaK0w8U02ZT8Sa3ZX5Uvir6fpI8XmfRcI.pptx',
            'created_at'=> $date_y,
        ]); // Post 3
        Post::create([
            'user_id' => '1',
            'category_id' => '5',
            'author' => 'qamanageruser',
            'content' => 'test content 5',
            #'image',
            'file' => 'uploads/JeMGIRN5Vb09a6z1uu0E3crNOSg2nEIeNGVKJFkk.xlsx',
            'created_at'=> $date_y,
        ]); // Post 4
        Post::create([
            'user_id' => '3',
            'category_id' => '1',
            'author' => 'qacooruser1',
            'content' => 'test content large: i0BItiDGyG5VgZdzcBE5lAW3w9M=|asdfGHJKLqwertyuiopZXCVbnm`[~],.<>?/\fp"-$53%^&*()$#@!|',
            #'image',
            'file' => 'uploads/RKTjsfj4xB9zg7Q6WlKFvO7mJD8GmrxaWqAqbEbF.png',
            'created_at'=> $date_y,
        ]); // Post 5
    }
}
