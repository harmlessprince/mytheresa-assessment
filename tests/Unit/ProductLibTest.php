<?php

namespace Tests\Unit;

use App\Library\ProductDiscountLibrary;
use App\Models\Product;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ProductLibTest extends TestCase
{
    protected ProductDiscountLibrary $productDiscountLibrary;
    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->productDiscountLibrary = app()->make(ProductDiscountLibrary::class);
    }

    public function test_actual_product_price_is_returned_as_original_price(): void
    {
        $product = new Product();
        $product->name = 'My name';
        $product->sku = '000009';
        $product->price = 100000;
        $product->category = 'sandals';
        $pricingDetails = $this->productDiscountLibrary->productPricing($product);
        $this->assertEquals($product->price, $pricingDetails['original']);
    }

    public function test_final_product_price_is_equal_to_original_price_when_no_discount_is_available(): void
    {
        $product = new Product();
        $product->name = 'My name';
        $product->sku = '000009';
        $product->price = 100000;
        $product->category = 'sandals';
        $pricingDetails = $this->productDiscountLibrary->productPricing($product);
        $this->assertEquals($pricingDetails['final'], $pricingDetails['original']);
    }

    public function test_final_product_price_is_not_equal_to_original_price_when_discount_is_available(): void
    {
        $product = new Product();
        $product->name = 'My name';
        $product->sku = '000003';
        $product->price = 100000;
        $product->category = 'sandals';
        $pricingDetails = $this->productDiscountLibrary->productPricing($product);
        $this->assertNotEquals($pricingDetails['final'], $pricingDetails['original']);
    }

    public function test_discount_percentage_is_not_null_when_at_least_one_discount_is_available(): void
    {
        $product = new Product();
        $product->name = 'My name';
        $product->sku = '000009';
        $product->price = 100000;
        $product->category = 'boots';
        $pricingDetails = $this->productDiscountLibrary->productPricing($product);
        $this->assertNotNull($pricingDetails['discount_percentage']);
    }

    public function test_discount_percentage_is_null_when_no_discount_is_available(): void
    {
        $product = new Product();
        $product->name = 'My name';
        $product->sku = '000009';
        $product->price = 100000;
        $product->category = 'slippers';
        $pricingDetails = $this->productDiscountLibrary->productPricing($product);
        $this->assertNull($pricingDetails['discount_percentage']);
    }

    public function test_maximum_discount_is_selected_when_multiple_discount_is_applicable(): void
    {
        $product = new Product();
        $product->name = 'My name';
        $product->sku = '000003';
        $product->price = 100000;
        $product->category = 'boots';
        $maxDiscount = $this->productDiscountLibrary->pickMaxDiscount($product);
        $pricingDetails = $this->productDiscountLibrary->productPricing($product);
        $this->assertEquals($maxDiscount . '%', $pricingDetails['discount_percentage']);
    }
}
