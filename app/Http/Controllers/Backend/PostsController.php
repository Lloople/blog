<?php

namespace App\Http\Controllers\Backend;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\ViewModels\PostDetailViewModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lloople\Notificator\Notificator;

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
        return view('backend.posts.edit', [ 'view' => new PostDetailViewModel(new Post())]);
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
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->thumbnail = '';
        $post->category_id = $request->category;
        $post->published_at = Carbon::createFromFormat('Y-m-d\TH:i', $request->published_at);
        $post->featured = $request->has('featured');
        $post->visible = $request->has('visible');
        $post->body = $request->body;

        $post->save();

        $post->syncTags($request->tags);

        Notificator::success('Post created successfully');

        return redirect()->route('backend.posts.edit', $post);
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
        return view('backend.posts.edit', [ 'view' => new PostDetailViewModel($post)]);
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
