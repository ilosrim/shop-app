<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
