<?php

namespace App\ViewModels;

use App\Models\Category;

class CategoryDetailViewModel
{

    public $category;
    public $title;
    public $action;
    public $method;

    public function __construct(Category $category)
    {
        $this->category = $category;


        $this->title = $category->exists
            ? "Edit Category: {$this->category->name}"
            : "Create Category";

        $this->action = $category->exists
            ? route('backend.categories.update', $this->category)
            : route('backend.categories.store');

        $this->method = $category->exists
            ? 'PUT'
            : 'POST';
    }
}