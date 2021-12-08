<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Offer;


class Cart
{

    public static function new(Product $product,Request $request)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }

        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $request->get('quantity')
        ];

        session()->put([
            'cart' => $cart,

        ]);

        $cart['total_amount'] = Cart::totalAmount();

        $cart['total_count'] = Cart::totalItem();
        
        session()->put([
            'cart' => $cart,

        ]);
      



        // session()->push('total_count',Cart::totalItem());
       
    }

    public static function totalAmount()
    {

        // dd(count(session()->get('cart')));

        $totalAmount = 0;
        // $sesh=session()->get('cart');

        // // dd($sesh);

        // if ($sesh->count() == 1) {
        //      if (is_array($sesh) && array_key_exists('product', $sesh) && array_key_exists('quantity', $sesh)) {
                
        //     $totalAmount += $sesh['product']->price_with_discount * $sesh['quantity'];

        //     }
        // }

        // if (is_array(self::sesh())) {
            foreach (self::getProduct() as $cartItem) {
                    // if (is_array($cartItem)) {
                        
                    $totalAmount += $cartItem['product']->price_with_discount * $cartItem['quantity'];

                    // }

                }
        // }
     
       // dd($totalAmount);


        return $totalAmount;
    }

    // public static function totalAmount1(Product $product)
    // {

    //     // if (is_array(self::sesh())) {
    //         foreach (session()->get('cart') as $cartItem) {
    //             if (is_array($cartItem)) {
                    
    //                 $totalAmount += $cartItem['product']->price_with_discount * $cartItem['quantity'];

    //             }

    //         }
    //     // }
     
       

    //     return $totalAmount;
    // }



    public static function totalItem()
    {
        $item=collect(self::sesh())->filter(function ($item)
        {
            return is_array($item);
        });
        // dd($item);

        return count($item);
    }
    public static function getProduct()
    {
        return collect(self::sesh())->filter(function ($item)
        {
            return is_array($item);
        });
    }

    public static function sesh()
    {
        if (!session()->has('cart')) {
            return null;
        }

        return session()->get('cart');
    }

    public static function remove(Product $product)
    {
        if (session()->has('cart')) {
            $cart = self::getProduct();
        }

        $cart->forget($product->id);

        session()->put([
            'cart' => $cart
        ]);

        $cart['total_amount'] = self::totalAmount();

        $cart['total_count'] = self::totalItem();

        session()->put([
            'cart' => $cart
        ]);
    }

    public static function removeAll()
    {
        session()->forget('cart');
    }

    public static function totalWithOffer($offer)
    {

        // dd($offer);
           
        if (!$offer->exists()) {
            
            return back()->withErrors(['کد تخفیف وجود ندارد']) && Cart::totalAmount();

        }


        return $withOff = Cart::totalAmount() - Cart::totalAmount() * $offer->firstOrFail()->valOff / 100;

    }

    // public static function wiiith()
    // {
        
    // }

}
