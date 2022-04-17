<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DislikeController extends Controller
{
    public function storing(Post $post, Request $request)
    {
        $data = $post->dislikeBy($request->user());
        if ($data){
            return response(null, 409);
        }

        $post->dislikes()->create([
            'user_id'=> $request->user()->id,
        ]);
        return back();
    }

    public function destroying(Post $post,Request $request)
    {
        $request->user()->dislikes()->where('post_id', $post->id)->delete();
        return back();
    }
}
