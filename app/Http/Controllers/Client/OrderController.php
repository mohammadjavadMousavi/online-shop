<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\Http\Requests\OrderRequest;
use App\Models\Offer;

class OrderController extends Controller
{
    public function create()
    {

        return view('client.order.create',[
            'items' => Cart::getProduct(),
            'totalCount' => Cart::totalItem(),
            'totalAmount' => Cart::totalAmount(),
            'withOff' => Cart::totalAmount()
        ]);
    }

    public function store(OrderRequest $request)
    {

        $offer = Offer::query()->where('code',$request->get('coupon'));

        $total = Cart::totalAmount();
        $rrr = explode(".", $total);
        $totalAmount = $rrr[0];
        settype($totalAmount, 'integer');


        if (!$offer->exists() && $request->get('coupon') != "") {
            return back()->withErrors(['کد تخفیف وجود ندارد']);
        }elseif ($offer->exists()) {
            $total =Cart::totalAmount() - Cart::totalAmount() * $offer->firstOrFail()->valOff / 100;
            $rrr = explode(".", $total);
            $totalAmount = $rrr[0];
            settype($totalAmount, 'integer');
        }


        $order = Order::query()->create([
            'amount' => $totalAmount,
            'address' => $request->get('address')
        ]);


        foreach (Cart::getProduct() as $item) {

            $product = $item['product'];
            $productQty = $item['quantity'];

            $order->details()->create([
                'product_id' => $product->id,
                'unit_amount' => $product->price_with_discount,
                'count' => $productQty,
                'total_amount' => $productQty * $product->price_with_discount
            ]);
        }

        Cart::removeAll();

        // dd($order);

        $invoice = (new Invoice)->amount($order->amount);

        return Payment::Purchase($invoice,function ($drive , $transactionId) use ($order)
        {
            $order->update([
                'transaction_id' => $transactionId
            ]);

        })->pay()->render();    

        // return redirect()->back();
    }

    public function callback(Request $request)
    {
        $order = Order::query()->where('transaction_id',$request->get('Authority'))->first();

        $order->update([
            'payment_status' => $request->get('Status')
        ]);

        return redirect(route('client.order.show',$order));
    }

    public function show(Order $order)
    {
        return view('client.order.show',[
            'order' => $order
        ]);
    }

    public function off(Request $request)
    {
        $offer = Offer::query()->where('code',$request->get('coupon'));
     



           return view('client.order.create',[
            'items' => Cart::getProduct(),
            'totalCount' => Cart::totalItem(),
            'totalAmount' => Cart::totalAmount(),
            'withOff' => Cart::totalWithOffer($offer)
        ]);

    }
}
