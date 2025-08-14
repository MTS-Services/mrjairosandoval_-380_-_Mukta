<?php

namespace App\Http\Requests\Admin\Article;

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
            'slug' => ['required', 'string', 'max:255', 'unique:articles,slug,'.$this->id],
            'sub_title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'content' => ['required', 'string'],
            'auther_name' => ['required', 'string', 'max:255'],
            'publiched_data' => ['required', 'date'],
            'read_time' => ['required', 'integer'],
            'mata_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string'],
            'meta_keywords' => ['required', 'string'],
        ]+ ($this->isMethod('POST') ? $this->store() : $this->update());
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
