<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController1;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController1
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
