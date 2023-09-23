<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {

        $posts = Post::all();
        $suggested_users = auth()->user()->suggested_users();
        return view('post.index' , compact(['posts' , 'suggested_users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'description' => 'required',
            'image' => ['required', 'mimes:jpeg,jpg,png,gif']
        ]);

        $image = $request['image']->store('posts' , 'public');

        $data['image'] = $image;
        $data['slug'] = Str::random(15);
        auth()->user()->posts()->create($data);

        return redirect()->back();

        // dd(request()->image);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            'description' => 'required',
            'image' => ['nullable' , 'mimes:jpeg,jpg,png,gif' ],
        ]);

        if($request->has('image')) {
            $image = $request['image']->store('posts' , 'public');
            $data['image'] = $image;
        }
        auth()->user()->posts()->update($data);

        return redirect('/p/' . $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/' .  $post->image);

        $post->delete();

        return redirect(route('home_page'));
    }

    public function explore(Post $post)
    {
        $posts = Post::whereRelation('owner' , 'private_account' , '=' , '0')
                    ->whereNot('user_id' , auth()->user()->id)
                    ->simplePaginate(12);
        return view('post.explore' , compact('posts'));
    }
}
