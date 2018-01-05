<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    private $pagination = 50;

    public function index()
    {
        return view('backend.tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->posts()->sync([]);

        $tag->delete();

        return [
            'result' => true,
            'message' => 'Tag deleted successfully',
        ];
    }

    public function resource(Request $request)
    {
        $tags = Tag::select('*');

        if ($request->has('q')) {
            $tags->where('name', 'like', "%{$request->q}%");
        }

        return TagResource::collection($tags->orderBy('name')->paginate($this->pagination));
    }
}
