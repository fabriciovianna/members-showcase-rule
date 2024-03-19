<?php

namespace App\Http\Requests\Preference;

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
            'preference_id' => ['required', 'numeric'],
            'description' => ['string', 'nullable', 'min:1', 'max:255'],
            'member_id' => ['numeric', 'nullable', 'exists:members,id']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'preference_id' => $this->route('preference_id'),
        ]);
    }
}
