<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        // Allow all users; adjust as needed
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'published_year' => 'nullable|integer',
            'copies_available' => 'required|integer|min:1',
        ];
    }
}