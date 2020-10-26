<?php

namespace App\Http\Controllers;

use App\Shop;
use http\Env\Response;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return Shop::all()->where('sellerId', auth()->user()->id);
    }

    public function show(Shop $shop)
    {
        return $shop;
    }

    public function store(Request $request)
    {
       if (auth()->user()->status === 1){
            $this->validateRequest( $request);
           $data = $request->all();
           $data['sellerId'] = auth()->user()->id;
           $shop = Shop::create($data);

            return response()->json($shop);
       }
       else{
           return response()->json(["name" => "AUTHENTICATION_FAILURE",'error' =>"You're not authorized to add shop"],401);
       }
    }

    public function update(Request $request, Shop $shop)
    {
        $shop->update($request->all());

        return response()->json($shop);
    }

    public function delete(Shop $shop)
    {
        $shop->delete();

        return response()->json(null, 204);
    }

    public  function  validateRequest( $request){
        $this->validate($request,[
            'shopName'=>'required | string | max:191',
            'shopEmail' =>'required | string | email | max:255 | unique:shops',
        ]);

    }
}
