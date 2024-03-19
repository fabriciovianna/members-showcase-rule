<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'team_primary_color' => ['string', 'required', 'min:6', 'max:6'],
            'team_id' => ['numeric', 'required', 'exists:teams,id'],
        ];
    }
}
