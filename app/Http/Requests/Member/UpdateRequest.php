<?php

namespace App\Http\Requests\Member;

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
            'member_id' => ['required', 'numeric'],
            'name' => ['string', 'nullable', 'min:1', 'max:255'],
            'role' => ['string', 'nullable', 'min:1', 'max:255'],
            'admission_date' => ['date', 'nullable'],
            'resignation_date' => ['date', 'nullable'],
            'team_id' => ['numeric', 'nullable', 'exists:teams,id'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'member_id' => $this->route('member_id'),
        ]);
    }
}
