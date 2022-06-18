<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\ValueObject\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        if(Auth::user()->role == 'user')
        {
            return view('orders.indexUser', [
                'orders' => Order::where('user_id', Auth::id())->paginate(6)
            ]);
        } else  return view('orders.indexAdmin', [
            'orders' => Order::paginate(6)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        $cart = Session::get('cart', new Cart());



        if($cart->hasItems()){
            $order = new Order();
            $order->quantity = $cart->getQuantity();
            $order->price = $cart->getSum();
            $order->user_id = Auth::id();
            $order->save();




            $productIds = $cart->getItems()->map(function ($item){
                return ['product_id' => $item->getProductId()]+['qty' => $item->getQuantity()];
            });

            $order->products()->attach($productIds);
//
//            dd($cart->getItems()->map(function ($item){
//                return ['qti' => $item->getQuantity()];
//            }));


//            $qty = $cart->getItems()->map(function ($item){
//                return ['qty' => $item->getQuantity()];
//            });
            //$order->products()->attach($qty);attach($qty);
            //dd($qty);
            //$order->products()->attach($qty);

            Session::put('cart', new Cart());
            return redirect(route('orders.index'))->with('status', 'Zamówienie przyjęte do realizacji');
        }
        return back();
    }
}

