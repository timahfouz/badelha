<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\AddressRequest;
use App\Http\Resources\API\AddressResource;

class AddressController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Address');
    }

    public function index()
    {
        $data = $this->pipeline->where('user_id', getUser()->id)->get();

        $response = AddressResource::collection($data);
        
        return jsonResponse(200, 'done.', $response);
    }

    public function store(AddressRequest $request)
    {
        $data = $request->only(['city','area','street_name','building_name','apartment_number','lat','lon']);

        $data['user_id'] = getUser()->id;

        $this->pipeline->create($data);
        
        return jsonResponse(201);
    }
}
