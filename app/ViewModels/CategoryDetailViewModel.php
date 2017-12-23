<?php

namespace App\ViewModels;

class CategoryDetailViewModel extends FormViewModel
{

    protected function setTitle()
    {
        $this->title = $this->model->exists
            ? "Edit Category: {$this->model->name}"
            : "Create Category";
    }

    protected function setAction()
    {
        $this->action = $this->model->exists
            ? route('backend.categories.update', $this->model)
            : route('backend.categories.store');
    }

    protected function setMethod()
    {
        $this->method = $this->model->exists
            ? 'PUT'
            : 'POST';
    }
}