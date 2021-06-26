<?php


namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\FrontController;
use phpDocumentor\Reflection\Types\True_;

class InvoiceController extends FrontController
{

    public function CreateInvoice($id)
    {
        return view('AdminPanel.PagesContent.invoices.createInvoice')->with(['client_id'=>$id]);
    }

    public function createInvoiceAndClient()
    {
        return view('AdminPanel.PagesContent.invoices.createInvoiceAndClient');
    }

    public function getAllInvoices()
    {
        return view('AdminPanel.PagesContent.invoices.getAllInvoices');
    }

}
