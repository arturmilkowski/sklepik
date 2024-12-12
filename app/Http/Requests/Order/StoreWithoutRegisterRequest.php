<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreWithoutRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:3', 'max:255'],
            'street' => ['required', 'min:3', 'max:255'],
            'zip_code' => ['required', 'regex:/^([0-9]{2})(-[0-9]{3})?$/i'],
            'city' => ['required', 'min:3', 'max:255'],
            'voivodeship_id' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'digits:9'],
            'comment' => ['max:1000'],
            'term' => 'required',
        ];
    }
}
