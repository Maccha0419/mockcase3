<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'category' => ['required', 'string', 'max:255'],
            'condition' => ['required', 'string', 'max:255'],
            'item_name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:255'],
            'item_img' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10480'],
        ];
    }
}
