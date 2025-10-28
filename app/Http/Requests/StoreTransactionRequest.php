<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        // Allow all users; adjust as needed
        return true;
    }

    public function rules()
    {
        return [
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ];
    }
}