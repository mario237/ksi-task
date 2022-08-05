<?php

namespace App\Http\Requests\Api\City;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required' , 'string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
