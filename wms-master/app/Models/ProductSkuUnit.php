<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductSkuUnit
 *
 * @property int $id
 * @property int $product_sku_id
 * @property int $product_unit_id
 * @property int $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit whereProductUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $is_default
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSkuUnit whereIsDefault($value)
 */
class ProductSkuUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_sku_id', 'product_unit_id', 'rate','is_default'
    ];
}
