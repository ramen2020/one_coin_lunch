<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'store_name' => 'required|string|max:50',
            'store_infomation' => 'required|string|max:500',
            'prefecture' => 'required',
            'city' => 'required|string',
            'street_address' => 'required|string',
            // 'image_name' => 'required|file|mimes:jpg,jpeg,png,gif',
            'high_budget' => 'integer|gt:low_budget',
            'low_budget' => 'integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'category_id_1' => 'required|digits_between:1,16|different:category_id_2, category_id_3, category_id_4, category_id_5',
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
            'gt' => '下限価格より大きい数値を入力してください。'
        ];
    }
}
