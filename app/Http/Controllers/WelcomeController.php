<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductPowered;
use Exception;
use http\Env\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
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
            $products = Product::where('name', 'LIKE', "%{$search3}%")
                ->orWhere('description', 'LIKE', "%{$search3}%")
                ->orWhereHas('brand', function (Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->search3 . '%');})
                ->orWhereHas('category', function (Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->search3 . '%');})
                ->orWhereHas('powered', function (Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->search3 . '%');})
                ->paginate(9);
        } else {
            $products = Product::paginate(9);
        }

        $filters = $request -> query('filter');
        $query = Product::query();

        if(!is_null($filters)) {
            if (array_key_exists('categories', $filters)) {
                $query = $query->whereIn('category_id', $filters['categories']);
            }

            if (array_key_exists('brands', $filters)) {
                $query = $query->whereIn('brand_id', $filters['brands']);
            }

            if (array_key_exists('powereds', $filters)) {
                $query = $query->whereIn('powered_id', $filters['powereds']);
            }

            if (!is_null($filters['price_min'])){
                $query = $query->where('price', '>=', $filters['price_min']);
            }

            if (!is_null($filters['price_max'])) {
                $query = $query->where('price', '<=', $filters['price_max']);
            }

            if (!is_null($filters['power_min'])){
                $query = $query->where('power', '>=', $filters['power_min']);
            }

            if (!is_null($filters['power_max'])) {
                $query = $query->where('power', '<=', $filters['power_max']);
            }

            if (!is_null($filters['battery_voltage_min'])){
                $query = $query->where('battery_voltage', '>=', $filters['battery_voltage_min']);
            }

            if (!is_null($filters['battery_voltage_max'])) {
                $query = $query->where('battery_voltage', '<=', $filters['battery_voltage_max']);
            }

            if (!is_null($filters['maximum_rotational_speed_min'])){
                $query = $query->where('maximum_rotational_speed', '>=', $filters['maximum_rotational_speed_min']);
            }

            if (!is_null($filters['maximum_rotational_speed_max'])) {
                $query = $query->where('maximum_rotational_speed', '<=', $filters['maximum_rotational_speed_max']);
            }

            return response()->json([
                'data' => $query->get(),
            ]);
        }


        return view("welcome", [
            'powereds' => ProductPowered::orderBy('name', 'ASC')->get(),
            'products' => $products,
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
            'brands' => ProductBrand::orderBy('name', 'ASC')->get(),
            'defaultImage' => 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg',
            'isGuest' => Auth::guest(),
            'isUser' => Auth::user(),
        ]);

    }
}
