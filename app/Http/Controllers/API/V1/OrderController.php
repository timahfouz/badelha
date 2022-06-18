<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\API\OrderRequest;

class OrderController extends InitController
{
    public function __construct()
    {
        parent::__construct();
        $this->pipeline->setModel('Order');
    }

    public function __invoke(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            
            $cart = $this->pipeline->setModel('Cart')->where([
                'id' => $request->cart_id,
                'user_id' => getUser()->id,
                'status' => 'preview'
            ])->first();
            
            if (!$cart) {
                return jsonResponse(404, 'not found!'); 
            }
    
            $this->pipeline->setModel('Order')->create([
                'user_id' => getUser()->id,
                'cart_id' => $request->cart_id
            ]);
            
            // Calculate Points Awarded For User
            $cart->update(['status' => 'checkedout']);

            DB::commit();
        } catch (\Exception $ex) {

            DB::rollback();
            return jsonResponse(400, $ex->getMessage());
        }
        return jsonResponse(201); 
    }
}
