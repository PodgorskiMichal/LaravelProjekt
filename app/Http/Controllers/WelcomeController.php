<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use http\Env\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Link;
use Symfony\Component\HttpFoundation\JsonResponse;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $search3 = request()->query('search3');

        if($search3){
            $products = Product::where('name', 'LIKE', "%{$search3}%")->paginate(4);
        } else {
            $products = Product::paginate(4);
        }

        $filters = $request -> query('filter');
        $query = Product::query();

        if(!is_null($filters)) {
            if (array_key_exists('categories', $filters)) {
                $query = $query->whereIn('category_id', $filters['categories']);
            }

            if (!is_null($filters['price_min'])){
                $query = $query->where('price', '>=', $filters['price_min']);
            }

            if (!is_null($filters['price_max'])) {
                $query = $query->where('price', '<=', $filters['price_max']);
            }
            return response()->json([
                'data' => $query->get(),
            ]);
        }


        return view("welcome", [
            'products' => $products,
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
            'defaultImage' => 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg',
            'isGuest' => Auth::guest(),
            'isUser' => Auth::user(),
        ]);

    }
}
