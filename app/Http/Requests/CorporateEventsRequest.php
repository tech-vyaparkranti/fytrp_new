<?php

namespace App\Http\Requests;

use App\Models\CorporateEventsModel;
use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CorporateEventsRequest extends FormRequest
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
            CorporateEventsModel::ID=>"bail|required_if:action,update,enable,disable|nullable|exists:corporate_events,id",
            CorporateEventsModel::TOP_HEADING=>"bail|required_if:action,update,insert|nullable",
            CorporateEventsModel::MAIN_HEADING=>"bail|required_if:action,update,insert|nullable",
            CorporateEventsModel::MAIN_CONTENT=>"bail|nullable|string",
            CorporateEventsModel::SERVICE_TEXT=>"bail|required_if:action,update,insert|nullable",
            CorporateEventsModel::CORPORATE_IMAGE=>"bail|file|image|max:2048|required_if:action,insert|",
            CorporateEventsModel::GALLERY_IMAGE=>"bail|file|image|max:2048|required_if:action,insert|",
            CorporateEventsModel::GALLERY_NAME=>"bail|required_if:action,update,insert|nullable",
            CorporateEventsModel::SORTING_NUMBER=>"required_if:action,update,insert|numeric|gt:0",
            "action"=>"bail|required|in:insert,update,enable,disable"
        ];
    }

    // public function messages()
    // {
    //     return [
    //         "destination_image.dimensions"=>"Dimensions should be in aspect ratio 208/121 or pixels w*h 374*250"
    //     ];
    // }

    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->getMessageBag()->first(),200));
    }
}
