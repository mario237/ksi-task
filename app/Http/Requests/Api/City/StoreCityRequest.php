<?php

namespace App\Http\Requests\Api\City;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required' , 'string' , 'unique:cities']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
