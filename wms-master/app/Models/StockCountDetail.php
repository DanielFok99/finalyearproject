<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StockCountDetail
 *
 * @property int $id
 * @property int $stock_count_id
 * @property int $stock_count_log_id
 * @property int $product_sku_id
 * @property int $product_unit_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockCountLog[] $log
 * @property-read int|null $log_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductSku[] $productSku
 * @property-read int|null $product_sku_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductUnit[] $productUnit
 * @property-read int|null $product_unit_count
 * @property-read \App\Models\StockCount|null $stockCount
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereProductUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereStockCountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereStockCountLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCountDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StockCountDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_count_id', 'stock_count_log_id', 'product_sku_id', 'product_unit_id',
        'quantity',
    ];

    public function stockCount()
    {
        return $this->belongsTo(StockCount::class);
    }

    public function log()
    {
        return $this->hasMany(StockCountLog::class);
    }

    public function productSku()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function productUnit()
    {
        return $this->hasMany(ProductUnit::class);
    }


}
