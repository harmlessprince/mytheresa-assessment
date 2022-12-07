<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var  Product $product */
        $product = $this->resource;

        return [
            'sku' => $product->sku,
            'name' => $product->name,
            'category' => $product->category,
            'price' => [
                'original' => $product->originalPrice,
                'final' => $product->finalPrice,
                'discount_percentage' => $product->discountPercentage ? $product->discountPercentage . '%' : null,
                'currency' => $product->currency,
            ]
        ];
    }


}
