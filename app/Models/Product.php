<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read int $id
 * @property string $name
 * @property string $sku
 * @property string $category
 * @property int|float $price
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

}
