<?php

namespace App\Http\Requests\Api\Entry;

use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required' , 'string'],
            'sentiment' => ['required','string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
