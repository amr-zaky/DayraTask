<?php

namespace  App\Http\Controllers\Admin;
use App\Models\User;
use App\Helper\ApiResponse;
use App\Helper\ApiValidator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login (Request $request )
    {
        $validationAdmin = ApiValidator::validate(User::registerRules());
        if ($validationAdmin) {
            return ApiResponse::errors($validationAdmin);
        }

       if(! $token=Auth::attempt($request->only('email','password')))
       {
            return  ApiResponse::errors(['Credentials'=>'Email or Password Wrong ']);
       }

        return response()->json(['token'=>$token]);
    }


}
