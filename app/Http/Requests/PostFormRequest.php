<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                $this->route('post')
                ? Rule::unique('posts')->ignore($this->route('post')->id)
                : 'unique:posts,title'
            ],
            'published_at' => 'required',
            'body' => 'required'
        ];
    }
}
