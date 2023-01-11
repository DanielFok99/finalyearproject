<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PurchaseOrderDetail
 *
 * @property int $id
 * @property int $product_sku_id
 * @property int $purchase_order_id
 * @property int $purchase_unit_id
 * @property int $quantity
 * @property string $price
 * @property string $discount
 * @property string $sub_total
 * @property string $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\ProductSku|null $productSku
 * @property-read Collection|\App\Models\ProductUnit[] $productUnits
 * @property-read int|null $product_units_count
 * @property-read \App\Models\PurchaseOrder|null $purchaseOrder
 * @method static Builder|PurchaseOrderDetail newModelQuery()
 * @method static Builder|PurchaseOrderDetail newQuery()
 * @method static Builder|PurchaseOrderDetail query()
 * @method static Builder|PurchaseOrderDetail whereCreatedAt($value)
 * @method static Builder|PurchaseOrderDetail whereDiscount($value)
 * @method static Builder|PurchaseOrderDetail whereId($value)
 * @method static Builder|PurchaseOrderDetail whereNotes($value)
 * @method static Builder|PurchaseOrderDetail wherePrice($value)
 * @method static Builder|PurchaseOrderDetail whereProductSkuId($value)
 * @method static Builder|PurchaseOrderDetail wherePurchaseOrderId($value)
 * @method static Builder|PurchaseOrderDetail wherePurchaseUnitId($value)
 * @method static Builder|PurchaseOrderDetail whereQuantity($value)
 * @method static Builder|PurchaseOrderDetail whereSubTotal($value)
 * @method static Builder|PurchaseOrderDetail whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PurchaseOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_sku_id', 'purchase_order_id', 'quantity', 'price',
        'discount', 'sub_total', 'notes', 'product_sku_unit_id',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
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
