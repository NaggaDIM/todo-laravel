<?php

namespace App\Http\Requests\Tasks;

use App\Enums\Tasks\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    public function rules(): array
    {
        return [
            'status'    => ['required', 'string', Rule::in(array_column(Status::cases(), 'name'))],
            ...parent::rules()
        ];
    }
}
