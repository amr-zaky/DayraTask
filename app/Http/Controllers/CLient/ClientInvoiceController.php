<?php


namespace App\Http\Controllers\CLient;


use App\Events\NewInvoiceHasCreatedEvent;
use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInvoice;
use App\Http\Requests\CreateInvoiceAndClient;
use App\Mail\SendInvoiceMail;
use App\Service\Client\CLinetServiceImp;
use App\Service\Client\InvoiceServiceImp;
use http\Exception\RuntimeException;
use Illuminate\Support\Facades\Mail;


class ClientInvoiceController extends Controller
{

    private $invoiceService;
    private $clientService;

    public function __construct(InvoiceServiceImp $invoiceService ,CLinetServiceImp  $clientService)
    {
        $this->invoiceService=$invoiceService;
        $this->clientService=$clientService;
    }

    public function getAllInvoices()
    {
        $invoices=$this->invoiceService->getAllInvoices();
        return ApiResponse::data($invoices);
    }

    public function createInvoiceAndCLinet(CreateInvoiceAndClient  $invoiceAndClientRequest)
    {
        try {
            $client=$this->clientService->store($invoiceAndClientRequest->getClientData());
            $invoice=array_merge($invoiceAndClientRequest->getInvoiceData(),['client_id'=>$client->id]);
            $invoice=$this->invoiceService->store($invoice);
            $this->sendInvoiceMail($client,$invoice);
            return ApiResponse::success('Invoice And Client Create Successfully');
        }
        catch(\Exception $e){
            //   DB::rollback(); if requirement restrict to send and create or not create
            return  ApiResponse::errors(['sendEmail'=>'Client and Invoice Created But Error in sending email ... Check Config ']);
        }
    }

    public function CreateInvoice(CreateInvoice  $createInvoiceRequest)
    {
        try {
            $invoice=$this->invoiceService->store($createInvoiceRequest->getInvoiceData());
            $client=$this->invoiceService->getInvoiceCLient($invoice->client_id);
            $this->sendInvoiceMail($client,$invoice);
            return ApiResponse::success('Invoice Created Successfully And Email was  Send .');
        }
        catch(\Exception $e){
            //   DB::rollback(); if requirement restrict to send and create or not create
            return  ApiResponse::errors(['sendEmail'=>'Invoice Created But Error in sending email ... Check Config ']);
        }
    }

    private function sendInvoiceMail($client,$invoice)
    {
        $emailData=[
            'email'=>$client->email,
            'name'=>$client->full_name,
            'mobile'=>$client->mobile,
            'amount'=>$invoice->amount,
            'date'=>$invoice->invoice_due_date,
        ];

        event(new NewInvoiceHasCreatedEvent($emailData));
    }

}
