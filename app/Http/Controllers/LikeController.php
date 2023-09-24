<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post  , Request $request)
    {
        auth()->user()->likes()->toggle($post);

        return back();
    }
}
