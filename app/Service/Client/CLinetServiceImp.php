<?php


namespace App\Service\Client;


use App\Models\Client;

class CLinetServiceImp
{

    function store($client)
    {
        return Client::create($client);
    }

    function getAllClients()
    {
        return Client::orderBy('created_at', 'DESC')->get();
    }

    function getOneClient($id)
    {
       return Client::with("clientsInvoice")->where('id',$id)->get();
    }
}
