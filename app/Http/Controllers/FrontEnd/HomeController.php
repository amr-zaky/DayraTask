<?php


namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\FrontController;

class HomeController extends FrontController
{
    public function index()
    {
        return view('AdminPanel.PagesContent.index');
    }
}
