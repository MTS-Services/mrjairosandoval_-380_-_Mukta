<?php

namespace App\Http\Requests\Admin\ArticleManagement;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => 'required|string|max:255',
            'sub_title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'auther_name' => ['required', 'string', 'max:255'],
            'published_data' => ['required', 'date'],
            'read_time' => ['required', 'integer'],
            'views' => ['required', 'integer'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string'],
            'meta_keywords' => ['required', 'string'],
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store(): array
    {
        return [
            'slug.unique' => 'Slug already exists',

        ];
    }

    public function update(): array
    {
        return [
            'slug.unique' => 'Slug already exists',
        ];
    }
}
