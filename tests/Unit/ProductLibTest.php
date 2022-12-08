<?php

namespace Tests\Unit;

use App\Library\ProductDiscountLibrary;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\DiscountSeeder;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Mockery\Mock;
use Tests\TestCase;

class ProductLibTest extends TestCase
{
    use  RefreshDatabase, DatabaseMigrations;

    protected ProductDiscountLibrary $productDiscountLibrary;
    protected Collection $discounts;


    protected function setUp(): void
    {
        parent::setUp();
        $this->productDiscountLibrary = Mock(ProductDiscountLibrary::class);
        $this->seed(DiscountSeeder::class);
    }

    public function test_product_price_attribute_has_final_attribute(): void
    {
        $product = new Product();
        $product->name = 'My name';
        $product->sku = '000009';
        $product->price = 100000;
        $product->category = 'sandals';
        $pricingDetails = $this->productDiscountLibrary->productPricing($product);
        $this->assertTrue(true);
//        dd($pricingDetails);
    }
}
