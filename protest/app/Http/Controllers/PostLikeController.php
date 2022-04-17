<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Database\Eloquent\Collection;

class PostLikeController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $data = $post->likeBy($request->user());
        if ($data){
            return response(null, 409);
        }

        $post->likes()->create([
            'user_id'=> $request->user()->id,
        ]);
        return back();
    }

    public function destroy(Post $post,Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
