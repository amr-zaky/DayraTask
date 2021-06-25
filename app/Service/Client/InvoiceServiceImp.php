<?php


namespace App\Service\Client;


use App\Models\Client;
use App\Models\ClientInvoice;

class InvoiceServiceImp
{
    function store($invoice)
    {
        return ClientInvoice::create($invoice);
    }

    function getAllInvoices()
    {
        return ClientInvoice::with('client')->get();
    }

    function getInvoiceCLient($clientId)
    {
        return Client::find($clientId);
    }
}
