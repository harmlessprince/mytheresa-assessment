<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Library\ProductDiscountLibrary;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetProductsController extends Controller
{
    public function __invoke(Request $request, ProductDiscountLibrary $productDiscountLibrary)
    {
        $category = $request->category;
        $priceLessThan = $request->priceLessThan;
        $perPage = $request->per_page ?? 5;

        $productQuery = Product::query();
        if ($category) $productQuery->where('category', 'LIKE', '%' . $category . '%');
        if ($priceLessThan && is_numeric($priceLessThan)) $productQuery->where('price', '<=', $priceLessThan);
        $products =  $productQuery->simplePaginate($perPage);
        foreach ($products as $product){
            /** @var  Product $product */
            $product->price = $productDiscountLibrary->productPricing($product);
        }
        return ['data' => $products];
    }

}
