<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\UserResource;
use Illuminate\Http\Request;

class UserController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Order');
    }

    public function __invoke()
    {
        $user = getUser();

        $response = new UserResource($user);
        
        return jsonResponse(200, 'done', $response); 
    }
}
