<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = $request->category;
        $priceLessThan = $request->priceLessThan;
        $perPage = $request->per_page ?? 5;

        $productQuery = Product::query();
        if ($category) $productQuery->where('category', 'LIKE', '%' . $category . '%');
        if ($priceLessThan) $productQuery->where('price', '<=', $priceLessThan);
        $products =  $productQuery->simplePaginate($perPage);
        return ProductResource::collection($products);
    }
}
