<?php

namespace App\Http\Controllers;

use App\Product;
use App\Shop;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
       if (auth()->user()->status === 1 ){
            $this->validateRequest( $request);

            if (Shop::where(['status' => 1, 'id' => $request->all()['shopId']])->count()){

                $product = Product::create($request->all());

                return response()->json($product);
            }
            else{
                return response()->json(['error' =>"You're Shop is not authorized to add Product"],401);
            }
       }
       else{
           return response()->json(['error' =>"You're not authorized to add Product"],401);
       }
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json($product);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }

    public  function  validateRequest( $request){
        $this->validate($request,[
            'shopId'=>'required',
            'productName'=>'required | string | max:191',
            'quantity' =>'required | string | max:255',
            'price' =>'required | string | max:255',
        ]);

    }
}
