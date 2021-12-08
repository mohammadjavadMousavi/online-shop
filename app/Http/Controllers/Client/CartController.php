<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
class CartController extends Controller
{

    // public function __construct()
    // {
    //     session_destroy();
    //     die();
    // }

    public function index()
    {
        return view('client.cart.index',[
            'items' => Cart::getProduct(),
            'totalCount' => Cart::totalItem(),
            'totalAmount' => Cart::totalAmount(),
        ]);
    }

    public function store(Request $request,Product $product)
    {

        // $i=1;
        // $i++;
        // $request->session()->flush();
        // dd(session()->get('cart'));
// die;
        // session()->put([
        //     'dd' => 'll'
        // ]);


        // dd($i);
        // $request->session()->flush();

        // for ($i=0; $i <= 2; $i++) { 
        //     if ($i==) {
        //         // code...
        //     }



        // }
        // dd(session()->get('cart'));
        // die();

        // if (!session()->get('cart')) {
        //     return 'ooo';
        // }
        // return 'ff';

        // return response(session()->get('cart'),200);
        Cart::new($product,$request);


        // $product = Product::find($request->get('productId'));
        return response([
            // 'dd' => dd(Cart::totalAmount()),
            'msg' => 'successful',
            'cart' => session()->get('cart'),
        ],200);
    }


    public function destroy(Product $product)
    {
        Cart::remove($product);

        return response([
            'msg' => 'remove',
            'cart' => Cart::sesh()
        ]);
    }

}
