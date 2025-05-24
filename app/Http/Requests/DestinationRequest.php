<?php

namespace App\Http\Requests;

use App\Models\DestinationModel;
use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DestinationRequest extends FormRequest
{
    use ResponseAPI;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->id?true:false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            DestinationModel::ID=>"bail|required_if:action,update,enable,disable|nullable|exists:our_destinations,id",
            DestinationModel::DESTINATION=>"bail|required_if:action,update,insert|nullable|string",
            DestinationModel::DESTINATION_DETAILS=>"bail|nullable|string",
            DestinationModel::DESTINATION_IMAGE=>"bail|required_if:action,insert|nullable|image",
            DestinationModel::POSITION=>"required_if:action,update,insert|numeric|gt:0",
            "meta_title" => "bail|nullable|string|max:255", // Meta title
            "meta_description" => "bail|nullable|string|max:255", // Meta description
            "meta_keywords" => "bail|nullable|string|max:255", 
            "action"=>"bail|required|in:insert,update,enable,disable"
        ];
    }

    public function messages()
    {
        return [
            "position.required_if"=>"Sorting number is required.",
            "position.strnumericing"=>"Sorting number should be a number.",
            "position.gt"=>"Sorting number should be greater than 0.",

        ];
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
