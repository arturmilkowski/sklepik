<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDeliveryAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'profile_id' => Auth::user()->profile->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile_id' => ['required'],
            'voivodeship_id' => ['required'],
            'street' => ['required', 'min:3'],
            'zip_code' => ['required', 'regex:/^([0-9]{2})(-[0-9]{3})?$/i'], // /^[0-9]{2}-?[0-9]{3}$/Du  'required|max:6|min:6',
            'city' => ['required', 'min:3'],
        ];
    }
}
