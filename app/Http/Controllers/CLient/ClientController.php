<?php


namespace App\Http\Controllers\Client;


use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewClient;
use App\Service\Client\CLinetServiceImp;


class ClientController extends Controller
{
    private $clientService;

    public function __construct(CLinetServiceImp $clientService)
    {
        $this->clientService=$clientService;
    }

    public function getAllClient()
    {
        $clients=$this->clientService->getAllClients();
        return ApiResponse::data(['clients'=>$clients]);
    }

    public function createClient(StoreNewClient  $request)
    {
          $client=$this->clientService->store($request->getAttributes());
          return  ApiResponse::data($client);
    }

    public function getOneClient($id)
    {
        $client=$this->clientService->getOneClient($id);
        return ApiResponse::data(['client'=>$client]);
    }

}
