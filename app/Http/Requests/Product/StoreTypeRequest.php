<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTypeRequest extends FormRequest
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
            'slug' => str()->slug($this->name),
            'hide' => $this->request->get('hide') ?? 0
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
            'product_id' => ['required'],
            'size_id' => ['required'],
            'slug' => ['required'],
            'name' => ['required', Rule::unique('types', 'name')->ignore($this->type)],
            'price' => ['required', 'numeric', 'min:1', 'max:9999.99'],
            'promo_price' => ['sometimes', 'min:0', 'max:9999.99'], // 'numeric',
            'quantity' => ['required', 'numeric', 'min:0', 'max:255'],
            'hide' => ['sometimes', 'boolean'],
            'description' => [],
            'img' => ['sometimes', 'file', 'image'],
        ];
    }
}
