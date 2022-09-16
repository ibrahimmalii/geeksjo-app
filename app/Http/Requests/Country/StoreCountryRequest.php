<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:countries|string|max:500|min:4',
            'slug' => 'required|unique:countries|string|max:500|min:4'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => str()->slug($this->name),
        ]);
    }
}
