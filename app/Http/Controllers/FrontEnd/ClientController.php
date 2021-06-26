<?php


namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\FrontController;

class ClientController extends FrontController
{
    public function index()
    {
        return view('AdminPanel.PagesContent.clients.index');
    }

    public function create()
    {
        return view('AdminPanel.PagesContent.clients.create');
    }

    public function getClientDetail($id)
    {
        return view('AdminPanel.PagesContent.clients.detail')->with(['id'=>$id]);
    }
}
