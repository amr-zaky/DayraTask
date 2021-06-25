<?php

namespace App\Http\Requests;


use App\Helper\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CreateInvoice extends FormRequest
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
            'client_id'=>'required|exists:clients,id',
            'amount'=>'required|numeric|gt:0',
            'invoice_due_date'=>'required|date:Y-m-d|after:today'
        ];
    }



    public function getInvoiceData()
    {
        return[
            'client_id'=>$this->input('client_id'),
            'amount'=>$this->input('amount'),
            'invoice_due_date'=>$this->input('invoice_due_date')
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::errors($validator->errors()));
    }
}
