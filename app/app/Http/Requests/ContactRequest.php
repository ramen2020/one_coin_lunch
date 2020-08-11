<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the mansion is authorized to make this request.
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
            'username' => 'required|max:50',
            'email' => 'required|email',
            'title' => 'required|max:50',
            'content' => 'required|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name' => '正しい賃料の値を入力してください。',
            'occupied_area_top.gt' => '正しい専有面積の値を入力してください。',
        ];
    }
}
