<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lloople\Notificator\Notificator;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryFormRequest;
use App\ViewModels\CategoryDetailViewModel;

class CategoriesController extends Controller
{
    private $pagination = 50;

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.edit', ['view' => new CategoryDetailViewModel(new Category())]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(CategoryFormRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->active = $request->has('active');

        $category->save();

        Notificator::success('Category created successfully');

        return redirect()->route('backend.categories.edit', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     *
     * @return void
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit', ['view' => new CategoryDetailViewModel($category)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Category $category
     *
     * @return void
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->active = $request->has('active');

        $category->save();

        Notificator::success('Category edited successfully');

        return redirect()->route('backend.categories.edit', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Category $category
     *
     * @return array
     * @throws \Exception
     */
    public function destroy(Request $request, Category $category)
    {
        if ($canDelete = $category->posts->count() === 0) {
            $category->delete();
        }

        $message = $canDelete
            ? 'Category deleted successfully.'
            : 'Cannot delete this category because it has posts.';

        if ($request->ajax()) {
            return ['result' => $canDelete, 'message' => $message];
        }

        $notificationType = $canDelete ? 'success' : 'error';

        Notificator::$notificationType($message);

        return redirect()->route('backend.categories.index');
    }

    public function resource(Request $request)
    {
        $categories = Category::select('*');

        if ($request->has('q')) {
            $categories->where('name', 'like', "%{$request->q}%");
        }

        return CategoryResource::collection($categories->orderBy('name')->paginate($this->pagination));
    }
}
