<?php


namespace App\Helper;


class ApiResponse{

    public static function unauthorized($errorsArray){
        return response(['status' => false, 'errors' => $errorsArray],401);
    }

    public static function errors($errorsArray){
        return response(['status' => false, 'errors' => $errorsArray],403);
    }

    public static function data($data){
        return response(['status' => true, 'data' => $data]);
    }

    public static function success($message)
    {
        return response(['status' => true, 'message' => $message]);
    }

}
