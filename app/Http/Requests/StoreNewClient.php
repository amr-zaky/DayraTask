<?php

namespace App\Http\Requests;

use App\Helper\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreNewClient extends FormRequest
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
        return[
            'full_name'=>'required',
            'email' => 'required|email|unique:clients,email',
            'mobile' => 'required|unique:clients|gt:0,min:11',
        ];
    }

    public function getAttributes():array
    {
        return [
            'full_name'=>$this->input('full_name'),
            'email'=>$this->input('email'),
            'mobile'=>$this->input('mobile'),
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::errors($validator->errors()));
    }


}
