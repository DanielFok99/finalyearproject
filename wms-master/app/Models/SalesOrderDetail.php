<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SalesOrderDetail
 *
 * @property int $id
 * @property int $product_sku_id
 * @property int $sales_order_id
 * @property int $product_unit_id
 * @property int $quantity
 * @property string $price
 * @property string $discount
 * @property string $sub_total
 * @property string $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductSku|null $productSku
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductUnit[] $productUnits
 * @property-read int|null $product_units_count
 * @property-read \App\Models\SalesOrder|null $salesOrder
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereProductUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereSalesOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesOrderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_sku_id', 'sales_order_id', 'quantity', 'price',
        'discount', 'sub_total', 'notes', 'product_sku_unit_id',
    ];

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }

    public function productSku()
    {
        return $this->hasOne(ProductSku::class);
    }

    public function productUnits()
    {
        return $this->hasMany(ProductUnit::class);
    }
}
