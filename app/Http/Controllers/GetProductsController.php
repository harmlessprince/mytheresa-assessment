<?php

namespace App\Http\Controllers;

use App\Library\ProductDiscountLibrary;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class GetProductsController extends Controller
{
    public function __invoke(Request $request, ProductDiscountLibrary $productDiscountLibrary): Paginator
    {
        $category =  $request->query->get('category');
        $priceLessThan =  $request->query->get('priceLessThan');
        $perPage = $request->query->get('per_page', 5);

        $productQuery = Product::query();
        if ($category != null) $productQuery->where('category', 'LIKE', '%' . $category . '%');
        if ($priceLessThan != null && is_numeric($priceLessThan)) $productQuery->where('price', '<=', $priceLessThan);
        $products =  $productQuery->simplePaginate($perPage);
        foreach ($products as $product){
            /** @var  Product $product */
            $product->price = $productDiscountLibrary->productPricing($product);
        }
        return $products;
    }

}
