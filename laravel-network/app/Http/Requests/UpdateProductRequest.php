<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:6|max:100',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable|max:10000',
            'image' => 'nullable|dimensions:min_width=100,min_height=100|mimes:jpg,png',
            'gallery.*' => 'nullable|mimes:jpg,png',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название обязательно',
            'title.min' => 'Минимум :min символов',
            'title.max' => 'Максимум :max символов',
            'price.regex' => 'Введите цену',
            'gallery.*.mimes' => 'Use jpg,png format',
        ];
    }
}
