<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EnquiryNowRequest extends FormRequest
{
    use ResponseAPI;
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
            "name"=>"required|string|max:50",
            "subject"=>"required|string|max:255",
            "email"=>"required|email|max:100",
            "message"=>"required|string|max:1000",
            "captcha"=>"required|captcha",
            "country_code"=>"nullable|string|max:10"
        ];
    }

    public function messages()
    {
        return ["captcha.captcha"=>"Invalid captcha text."];
    }
    
    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->getMessageBag()->first(),200));
    }
}
