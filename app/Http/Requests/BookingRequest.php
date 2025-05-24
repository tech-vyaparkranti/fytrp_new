<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookingRequest extends FormRequest
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
            "customer_name"=>"required|string",
            "customer_email"=>"required|email",
            "customer_mobile"=>"required|numeric|digits_between:10,10",
            "booking_date_time"=>"required|date|after:now",
            "guest_count"=>"required|in:1,2,3,4",
            "captcha"=>"required|captcha"
        ];
    }
    public function messages()
    {
        return [
            "required.customer_name"=>"Please enter your name to continue.",
            "required.string"=>"Please enter a valid name.",
            "customer_email.required"=>"Enter email your email to continue.",
            "customer_email.email"=>"Enter a valid email to continue.",
            "customer_mobile.required"=>"Mobile number is required.",
            "customer_mobile.digits_between"=>"Mobile number should be 10 digits long.",
            "booking_date_time.after"=>"Booking date should be after current date time",
            "guest_count.in"=>"Guest count can be between 1 to 4.",
            "captcha"=>"required|captcha"
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
