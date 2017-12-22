<?php

namespace App\ViewModels;

class ThemeDetailViewModel extends FormViewModel
{

    protected function setTitle()
    {
        $this->title = $this->model->exists
            ? "Edit Theme: {$this->model->name}"
            : "Create Theme";
    }

    protected function setAction()
    {
        $this->action = $this->model->exists
            ? route('backend.themes.update', $this->model)
            : route('backend.themes.store');
    }

    protected function setMethod()
    {
        $this->method = $this->model->exists
            ? 'PUT'
            : 'POST';
    }
}