<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'brand_id' => ['required'],
            'category_id' => ['required'],
            'concentration_id' => ['required'],
            'name' => ['required', 'max:255', Rule::unique('products', 'name')->ignore($this->product)],
            'slug' => [],
            'description' => [],
            'img' => [],
            'site_description' => [],
            'site_keyword' => [],
            'hide' => [],
        ];
    }
}
