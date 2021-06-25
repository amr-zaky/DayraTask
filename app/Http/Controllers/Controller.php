<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $defaultLimit = 5;
    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }

    public function getOffset()
    {
        if (request()->offset > 0) {
            $offset = (int)request()->offset;
            $offset*=$this->defaultLimit;
        } else {
            $offset = 0;
        }

        return $offset;
    }

    public function getLimit()
    {
        if (request()->limit > 0) {
            $limit = request()->limit;
        } else {
            $limit = $this->defaultLimit;
        }

        return $limit;
    }

    public function nextOffset()
    {
        return $this->getOffset()+$this->defaultLimit;
    }
}
