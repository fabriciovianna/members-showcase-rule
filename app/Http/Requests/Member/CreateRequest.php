<?php

namespace App\Http\Requests\Member;

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
            'name' => ['string', 'required', 'min:1', 'max:255'],
            'role' => ['string', 'nullable', 'min:1', 'max:255'],
            'admission_date' => ['date', 'required'],
            'resignation_date' => ['date', 'nullable'],
            'team_id' => ['numeric', 'required', 'exists:teams,id'],
        ];
    }
}
