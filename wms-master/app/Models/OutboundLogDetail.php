<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OutboundLogDetail
 *
 * @property int $id
 * @property int $outbound_log_id
 * @property int $product_sku_id
 * @property int $product_unit_id
 * @property int $count_quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OutboundLog|null $outboundLog
 * @property-read \App\Models\ProductSku|null $productSku
 * @property-read \App\Models\ProductUnit|null $productUnit
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail whereCountQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail whereOutboundLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail whereProductUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLogDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OutboundLogDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'outbound_log_id', 'product_sku_id', 'product_unit_id', 'count_quantity',

    ];

    public function outboundLog()
    {
        return $this->belongsTo(OutboundLog::class);
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
