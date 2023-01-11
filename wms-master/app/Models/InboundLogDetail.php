<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InboundLogDetail
 *
 * @property int $id
 * @property int $inbound_log_id
 * @property int $product_sku_id
 * @property int $product_unit_id
 * @property int $count_quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\InboundLog|null $inboundLog
 * @property-read \App\Models\ProductSku|null $productSku
 * @property-read \App\Models\ProductUnit|null $productUnit
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail whereCountQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail whereInboundLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail whereProductUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLogDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InboundLogDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'inbound_log_id', 'product_sku_id', 'product_unit_id', 'count_quantity',
    ];

    public function inboundLog()
    {
        return $this->belongsTo(InboundLog::class);
    }

    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }

    public function productUnit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
}
