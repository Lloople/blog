<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

abstract class FormViewModel
{

    public $model;
    public $title;
    public $action;
    public $method;

    public function __construct(Model $model)
    {
        $this->model = $model;

        $this->setTitle();

        $this->setAction();

        $this->setMethod();
    }

    protected abstract function setTitle();

    protected abstract function setAction();

    protected abstract function setMethod();
}