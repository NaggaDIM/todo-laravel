<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['required', 'string', 'max:1000'],
        ];
    }

    public function authorize(): true
    {
        return true;
    }
}
