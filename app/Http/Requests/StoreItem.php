<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItem extends FormRequest
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
            'name'        => 'bail|required|min:4|max:12',
            'description' => 'required|min:6|max:254',
            'price'       => 'required',
            'category_id' => 'required',
            'image'       => 'required|min:1|max:4'
        ];
    }
}
