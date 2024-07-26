<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'title.required' => 'Sarlavha kiritish majburiy',
            'description.required' => 'Qisqacha mazmun kiritish majburiy',
            'content.required' => 'Post matnini kiritish majburiy',
        ];
    }

    // public function attributes(): array
    // {
    //     return [
    //         'title' => 'Sarlavha',
    //     ];
    // }
    
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
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ];
    }
}
