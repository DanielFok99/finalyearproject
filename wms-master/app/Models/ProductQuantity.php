<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductQuantity
 *
 * @property int $id
 * @property int $quantity
 * @property int $product_unit_id
 * @property int $product_sku_id
 * @property int $supplier_id
 * @property int $warehouse_id
 * @property string $purchase_price
 * @property string $selling_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereProductUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereWarehouseId($value)
 * @mixin \Eloquent
 */
class ProductQuantity extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity', 'product_unit_id','product_sku_id', 'supplier_id',
        'warehouse_id','purchase_price','selling_price',
    ];


}
