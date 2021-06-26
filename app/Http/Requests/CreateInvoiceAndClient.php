<?php

namespace App\Http\Requests;


use App\Helper\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CreateInvoiceAndClient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'full_name'=>'required',
            'email' => 'required|email|unique:clients,email',
            'mobile' => 'required|unique:clients,mobile|gt:0',
            'amount'=>'required|gt:0',
            'invoice_due_date'=>'required|date:Y-m-d|after:today'
        ];
    }

    public function getClientData():array
    {
        return[
            'full_name'=>$this->input('full_name'),
            'email'=>$this->input('email'),
            'mobile'=>$this->input('mobile'),
        ];
    }
    public function getInvoiceData():array
    {
        return[
            'amount'=>$this->input('amount'),
            'invoice_due_date'=>$this->input('invoice_due_date')
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::errors($validator->errors()));
    }
}
