<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateHotelRequest extends FormRequest
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
            'name' => ['required', 'min:10', 'regex:/^(?!.*(Free|Offer|Book|Website)).*$/'],
            'rating' => ['required', 'integer', 'between:0,5'],
            'category' => ['required', 'string',Rule::in(['hotel', 'alternative', 'hostel', 'lodge', 'resort', 'guest-house'])],
            'location.zipCode' => ['required', 'digits:5', 'numeric'],
            'image' => ['required', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
            'reputation' => ['required', 'integer', 'between:0,1000'],
            'price' => ['required', 'integer'],
            'availability' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'The :attribute must not contain banned words.',
            'image.regex' => 'The :attribute must be a valid url'
        ];
    }
}
