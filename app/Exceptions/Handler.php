<?php

namespace App\Exceptions;

use App\Helper\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Response;
use Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function(TokenInvalidException $e, $request){
            return ApiResponse::unauthorized(['error'=>'Invalid token']);
        });
        $this->renderable(function (TokenExpiredException $e, $request) {
            return ApiResponse::unauthorized(['error'=>'Token has Expired']);
        });

        $this->renderable(function (JWTException $e, $request) {
            return ApiResponse::unauthorized(['error'=>'Token not parsed']);
        });
    }
}
