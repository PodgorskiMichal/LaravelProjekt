<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ValueObject\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return view
     */
    public function index(): view
    {
        return view('cart.index', [
            'cart' => Session::get('cart', new Cart())
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Product $product
     * @return JsonResponse
     */
    public function store(Product $product): JsonResponse
    {


        $cart = Session::get('cart', new Cart());


        Session::put('cart', $cart->addItem($product));

        return response()->json([
            'status' => 'success',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            $cart = Session::get('cart', new Cart());
            Session::put('cart', $cart->removeItem($product));

            Session::flash('status', 'Produkt został usunięty z koszyka!');
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'
            ])->setStatusCode(500);
        }
    }
}
