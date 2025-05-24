<?php

namespace App\Http\Requests;

use App\Models\Blog;
use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlogRequest extends FormRequest
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
    // public function rules()
    // {
    //     return [
    //         "id"=>"bail|required_if:action,update,enable,disable|nullable|exists:blogs,id",
    //         "action"=>"bail|required|in:insert,update,enable,disable",
    //         "title"=>"bail|required|string|max:500",
    //         "content"=>"bail|required",
    //         "blog_date"=>"bail|required",
    //         "blog_category"=>"bail|nullable|string|max:500",
    //         "image"=>"bail|file|image|max:2048|required_if:action,insert",
    //         "blog_status"=>"required_if:action,update|in:live,disabled",
    //         "blog_sorting"=>"required_if:action,update,insert|numeric|gt:0"
    //     ];
    // }

    public function rules()
    {
        $action = $this->input('action');
    
        switch ($action) {
            case 'enable':
            case 'disable':
                return [
                    'id' => 'required|exists:blogs,id',
                ];
    
            case 'insert':
                return [
                    'title' => 'required|string',
                    'content' => 'required|string',
                    'short_content' => 'required|string',
                    'blog_date' => 'required|date',
                    'blog_category' => 'required|string',
                    'meta_title' => 'bail|nullable',
                    'meta_keyword' => 'bail|nullable',
                    'meta_description' => 'bail|nullable',
                    'blog_sorting' => 'nullable|integer',
                    'blog_status' => 'required|in:live,disabled',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg',
                    'image2' => 'nullable|image|mimes:jpeg,png,jpg',
                    'image3' => 'nullable|image|mimes:jpeg,png,jpg',
                ];
    
            case 'update':
                return [
                    'id' => 'required|exists:blogs,id',
                    'title' => 'required|string',
                    'content' => 'required|string',
                    'short_content' => 'required|string',
                    'blog_date' => 'required|date',
                    'blog_category' => 'required|string',
                    'meta_title' => 'bail|nullable',
                    'meta_keyword' => 'bail|nullable',
                    'meta_description' => 'bail|nullable',
                    'blog_sorting' => 'nullable|integer',
                    'blog_status' => 'required|in:live,disabled',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg',
                    'image2' => 'nullable|image|mimes:jpeg,png,jpg',
                    'image3' => 'nullable|image|mimes:jpeg,png,jpg',
                ];
    
            default:
                return [];
        }
    }
    
    
    public function messages()
    {
        return [

            "blog_status.required_if"=>"Slide status is requried.",
            "blog_status.in"=>"Slide status can be live or disabled.",
            "image.max"=>"Max image size should be 2 mb.",
            "image.max2"=>"Max image size should be 2 mb.",
            "image.max3"=>"Max image size should be 2 mb.",
            // "image.dimensions"=>"Dimensions should be in aspect ratio 16:9 or pixels w*h 1920*1080"
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
