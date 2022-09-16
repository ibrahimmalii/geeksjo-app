<?php

namespace App\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAreaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'city_id' => 'required|int|exists:cities,id',
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
