<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCodeRule;

class ProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'img_url' => ['image', 'mimes:jpeg,png', 'jpg|max:2048'],
            'postcode' => ['required', new ZipCodeRule],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['max:120'],
        ];
    }
}
