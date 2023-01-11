<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OutboundDtl
 *
 * @property int $id
 * @property int $outbound_id
 * @property int $product_sku_id
 * @property string $doc_uom
 * @property int $doc_quantity
 * @property int $uom_rate
 * @property string $base_uom
 * @property int $base_quantity
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Outbound|null $outbound
 * @property-read \App\Models\ProductSku|null $productSku
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereBaseQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereBaseUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereDocQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereDocUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereOutboundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereUomRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundDtl whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OutboundDtl extends Model
{
    use HasFactory;

    protected $fillable = [
        'outbound_id', 'product_sku_id', 'doc_uom', 'doc_quantity',
        'uom_rate', 'base_uom', 'base_quantity', 'quantity',
    ];

    public function outbound()
    {
        return $this->belongsTo(Outbound::class);
    }

    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }
}
