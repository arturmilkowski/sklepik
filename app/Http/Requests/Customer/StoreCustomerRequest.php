<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'voivodeship_id' => ['required'],
            'name' => ['required'],
            'surname' => ['required'],
            'street' => ['required', 'min:3'],
            'zip_code' => ['required', 'regex:/^([0-9]{2})(-[0-9]{3})?$/i'],
            'city' => ['required'],
            'email' => ['required', 'min:5', 'max:60'],
            'phone' => ['nullable'], // 'digits:9'
        ];
    }
}
