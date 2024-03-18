<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'team_id' => ['required', 'numeric'],
            'name' => ['string', 'required', 'min:1', 'max:255'],
            'description' => ['string', 'nullable', 'min:1', 'max:255'],
            'icon' => ['string', 'nullable'],
            'birthday' => ['date', 'nullable'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'team_id' => $this->route('team_id'),
        ]);
    }
}
