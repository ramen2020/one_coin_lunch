<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFilterRequest extends FormRequest
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
            'high_budget' => 'nullable|integer|gt:low_budget',
            'low_budget' => 'nullable|integer',
            'category_id_1' => 'nullable|digits_between:1,16|different:category_id_2, category_id_3, category_id_4, category_id_5',
            'category_id_2' => 'nullable|digits_between:1,16|different:category_id_3, category_id_4, category_id_5',
            'category_id_3' => 'nullable|digits_between:1,16|different:category_id_4, category_id_5',
            'category_id_4' => 'nullable|digits_between:1,16|different:category_id_5',
            'category_id_5' => 'nullable|digits_between:1,16',
        ];
    }

    public function messages()
    {
        return [
            'different' => 'カテゴリには、異なった値を入力してください。',
            'gt' => '上限価格には、下限価格より大きい数値を入力してください。'
        ];
    }
}
