<?php

namespace App\Http\Requests\Admin\Contact;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
           
            'patience'=>'required|string|max:255',
            'introducer'=>'required|string|max:255',
            
            
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());;
    }
    protected function store(): array
    {
        return [
           
            'email' => ['required', 'string', 'email', Rule::unique('contacts', 'email')],
        ];
    }
    public function update(): array
    {
        return [
          'email' => ['required', 'string', 'email', Rule::unique('contacts', 'email')->ignore(decrypt($this->route('contact')))],
        ];
    }
}
