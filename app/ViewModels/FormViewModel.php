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

    abstract protected function setTitle();

    abstract protected function setAction();

    abstract protected function setMethod();

    public function inputText($field, $label, $id = null)
    {
        return $this->inputForm('text', $field, $label, $id);
    }

    public function inputCheckbox($field, $label, $id = null)
    {
        return $this->inputForm('checkbox', $field, $label, $id);
    }

    private function inputForm($input, $field, $label, $id)
    {
        return view('backend.partials.form.'.$input, [
            'name' => $field,
            'label' => $label,
            'value' => $this->model->{$field},
            'id' => $id ?? $field,
        ])->render();
    }
}
