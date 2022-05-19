<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string',
            'cost' => 'integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
