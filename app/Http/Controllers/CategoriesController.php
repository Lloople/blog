<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ];

        return view('categories.index', $data);
    }

    public function show($slug)
    {
        if (! $category = Category::findBySlug($slug)) {
            abort(404);
        }

        $data = [
            'category' => $category,
        ];

        return view('categories.show', $data);
    }
}
