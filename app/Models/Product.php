<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 * @property string $sku
 * @property string $category
 * @property int $price
 * @property-read  int $originalPrice
 * @property-read  int $finalPrice
 * @property-read $discountPercentage
 * @property-read $currency
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'id'];
    public const CURRENCY = 'EUR';

    public function originalPrice(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->price,
        );
    }

    protected function finalPrice(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>  $this->price - (($this->discount_percentage / 100) * $this->price),
        );
    }

    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->pickMaxDiscount(),
        );
    }

    protected function currency(): Attribute
    {
        return Attribute::make(
            get: fn($value) => self::CURRENCY
        );
    }

    private function fetchApplicableDiscounts(): \Illuminate\Support\Collection
    {
        return Discount::query()->select('percentage', 'pointer')->whereIn('pointer', [$this->sku, $this->category])->get()->pluck('percentage');
    }

    private function pickMaxDiscount():?float
    {
        return $this->fetchApplicableDiscounts()->max();
    }
}
