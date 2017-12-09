<?php

namespace App\Http\Controllers\Backend;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    private $pagination = 10;

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'post' => new Post()
        ];
        return view('backend.posts.edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     *
     * @return void
     */
    public function edit(Post $post)
    {
        $data = [
            'post' => $post
        ];

        return view('backend.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     *
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     *
     * @return array
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);

        $post->delete();

        return ['result' => true];
    }

    public function resource(Request $request)
    {
        $posts = Post::with('tags');

        if ($request->has('q')) {
            $posts->searchLike($request->q);
        }

        return PostResource::collection($posts->orderBy('published_at', 'DESC')->paginate($this->pagination));
    }
}
