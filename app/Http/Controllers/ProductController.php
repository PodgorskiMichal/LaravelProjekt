<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): view
    {

        $search1 = request()->query('search1');
        if($search1){
            $products = Product::where('name', 'LIKE', "%{$search1}%")->paginate(2);
        } else {
            $products = Product::paginate(10);
        }

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): view
    {
        return view("products.create", [
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = new Product($request->validated());
        if($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('products');
        }
        $product->save();
        return redirect(route('products.index'))->with('status', 'Produkt dodany do bazy!');
    }

    /**
     * Display the specified resource.
     *
     * @param Product  $product
     * @return View
     */
    public function show(Product $product): View
    {

    return view("products.show", [
        'product' => $product,
    ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return view("products.edit", [
            'product' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $product->fill($request->validated());

        if($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('products');
        }
        $product->save();
        return redirect(route('products.index'))->with('status', 'Produkt zaktualizowany w bazie!');
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
            $product -> delete();
            Session::flash('status', 'Produkt został usunięty z bazy!');
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
