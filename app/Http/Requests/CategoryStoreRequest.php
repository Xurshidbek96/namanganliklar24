<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name_uz' => 'required',
            'name_ru' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_uz.required' => 'Nom o`zbekchasi kiritilsin',
            'name_ru.required' => 'Nom ruschasi kiritilsin',
        ];
    }
}