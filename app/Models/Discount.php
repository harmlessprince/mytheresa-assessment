<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $sku
 * @property string $pointer
 * @property int $percentage
 */
class Discount extends Model
{
    use HasFactory;
}
