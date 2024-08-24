<?php

namespace Core\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as ApiController;

class BaseApiController extends ApiController
{
    use AuthorizesRequests, ValidatesRequests, ApiResponse;
}
