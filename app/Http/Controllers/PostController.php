<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',
        compact('posts'));
    }
    public function  like() : JsonResponse
    {
        $post = Post::findOrFail(request()->id);
        if($post->isLikedByLoggedUser())
        {
            $res =  Like::where(
                [
                    'user_id' => auth()->user()->id,
                    'post_id' => $post->id
                ]
            )->delete();
            if($res)
            {
                return response()->json(
                    [
                        'count' => Post::findOrFail($post->id)->likes->count()
                    ]
                    );
            }
        }else
        {
            $like = Like::create(
                [
                    'user_id' => Auth::id(),
                    'post_id' => $post->id
                ]
                );
                return response()->json(
                    [
                        'count' => Post::findOrFail($post->id)->likes->count()
                    ]
                    );
        }
    }
}
