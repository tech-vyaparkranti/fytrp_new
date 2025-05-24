<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MenuItemRequest extends FormRequest
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
            "id"=>"bail|required_if:action,update,enable,disable|nullable|exists:menu_items,id",
            "action"=>"bail|required|in:insert,update,enable,disable",
            "item_name"=>"bail|required_if:action,insert,update",
            "currency"=>"bail|required_if:action,insert,update|in:INR,USD",
            "item_details"=>"bail|required_if:action,insert,update",
            "item_priority"=>"bail|nullable|numeric|min:0",
            "price"=>"bail|required_if:action,insert,update|numeric|min:0",
            "item_image"=>"bail|file|image|max:2048|required_if:action,insert"
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
