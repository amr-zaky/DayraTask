<?php


namespace App\Http\Controllers\CLient;


use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInvoice;
use App\Http\Requests\CreateInvoiceAndClient;
use App\Mail\SendInvoiceMail;
use App\Service\Client\CLinetServiceImp;
use App\Service\Client\InvoiceServiceImp;
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
        $client=$this->clientService->store($invoiceAndClientRequest->getClientData());
        $invoice=array_merge($invoiceAndClientRequest->getInvoiceData(),['client_id'=>$client->id]);
        $invoice=$this->invoiceService->store($invoice);
        $this->sendInvoiceMail($client,$invoice);
        return ApiResponse::success('Invoice And Client Create Successfully');
    }

    public function CreateInvoice(CreateInvoice  $createInvoiceRequest)
    {
       $invoice=$this->invoiceService->store($createInvoiceRequest->getInvoiceData());
       $client=$this->invoiceService->getInvoiceCLient($invoice->client_id);
        $this->sendInvoiceMail($client,$invoice);
        return ApiResponse::success('Invoice Created Successfully');
    }

    private function sendInvoiceMail($client,$invoice)
    {
        $emailData=[
            'name'=>$client->full_name,
            'mobile'=>$client->mobile,
            'amount'=>$invoice->amount,
            'date'=>$invoice->invoice_due_date,
        ];
       return  Mail::to($client->email)->send(new SendInvoiceMail($emailData));
    }

}
