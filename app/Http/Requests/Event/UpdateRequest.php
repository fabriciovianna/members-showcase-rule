<?php

namespace App\Http\Requests\Event;

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
            'event_id' => ['required', 'numeric'],
            'description' => ['string', 'required', 'min:1', 'max:255'],
            'event_date' => ['date', 'required'],
            'member_id' => ['numeric', 'required', 'exists:members,id'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'event_id' => $this->route('event_id'),
        ]);
    }
}
