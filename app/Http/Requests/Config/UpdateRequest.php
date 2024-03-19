<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'config_id' => ['required', 'numeric'],
            'team_primary_color' => ['string', 'nullable', 'min:6', 'max:6'],
            'team_id' => ['numeric', 'nullable', 'exists:teams,id'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'config_id' => $this->route('config_id'),
        ]);
    }
}
