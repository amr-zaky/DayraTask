<?php


namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\FrontController;

class AuthController extends FrontController
{
    public function login ()
    {

        return view('AdminPanel.login');
    }

}
