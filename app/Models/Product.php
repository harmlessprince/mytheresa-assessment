<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property-read int $id
 * @property string $sku
 * @property string $category
 * @property int $price
*/
class Product extends Model
{
    use HasFactory;
    protected  $guarded = [];
    public const CURRENCY = 'EUR';

    protected function originalPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price,
        );
    }
    protected function finalPrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
    protected function currency(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => self::CURRENCY
        );
    }
}
