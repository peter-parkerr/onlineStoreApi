<?php

namespace App\Http\Controllers;

use App\Product;
use App\Shop;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        $result = DB::table('users')
            ->select('*')
            ->join('shops', 'shops.sellerId', '=', 'users.id')
            ->join('products', 'products.shopId', '=', 'shops.id')
            ->where('users.id', $id)
            ->get();

        return response()->json($result);
    }

    /**Approve Seller
     * @param Request $request
     * @param User $user
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveSeller(Request $request, User $user, $id)
    {
        $user = User::where('id', $id)->first();
       if ($user && $user->role === 'Seller'){
           $user->status = 1;
           $user->update();

           return response()->json($user);
       }
       else{
           return response()->json(['error' => 'No Seller found with this Id '.$id], 400);
       }

    }

    /** Reject the Seller
     * @param Request $request
     * @param User $user
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function rejectSeller(Request $request, User $user, $id)
    {
        $user = User::where('id', $id)->first();
        if ($user && $user->role === 'Seller'){
            $user->status = 2;
            $user->update();

            return response()->json($user);
        }
        else{
            return response()->json(['error' => 'No Seller found with this Id'.$id], 400);
        }
    }

    /**Approve Seller Shop
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveShop($id)
    {
        $shop = Shop::where('id', $id)->first();
        if ($shop && $shop->status === 0){
            $shop->status = 1;
            $shop->update();

            return response()->json($shop);
        }
        else{
            return response()->json(['error' => 'No Shop found with this Id'.$id], 400);
        }
    }

    /**Reject seller shop
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function rejectShop($id)
    {
        $shop = Shop::where('id', $id)->first();
        if ($shop && $shop->status === 0){
            $shop->status = 2;
            $shop->update();

            return response()->json($shop);
        }
        else{
            return response()->json(['error' => 'No Shop found with this Id'.$id], 400);
        }
    }

    /**Approve Shop Product
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveProduct($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product && $product->status === 0){
            $product->status = 1;
            $product->update();

            return response()->json($product);
        }
        else{
            return response()->json(['error' => 'No Product found with this Id'.$id], 400);
        }
    }

    /**Reject Shop Product
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function rejectProduct($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product && $product->status === 0){
            $product->status = 2;
            $product->update();

            return response()->json($product);
        }
        else{
            return response()->json(['error' => 'No Product found with this Id'.$id], 400);
        }
    }

}
