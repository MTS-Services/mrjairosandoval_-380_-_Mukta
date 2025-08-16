<?php

namespace App\Http\Requests\Admin\ArticleManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleCategoryRequest extends FormRequest
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


        ] + ($this->isMethod('POST') ? $this->store() : $this->update());;
    }
    protected function store(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', Rule::unique('article_categories', 'name')],
            'slug' => ['required', 'string', 'min:3', Rule::unique('article_categories', 'slug')],
        ];
    }
    public function update(): array
    {
        return [
            'slug' => ['required', 'string', 'min:3', Rule::unique('article_categories', 'slug')->ignore(decrypt($this->route('article_category')))],
            'name' => ['required', 'string', 'min:3', Rule::unique('article_categories', 'name')->ignore(decrypt($this->route('article_category')))],
        ];
    }
}
