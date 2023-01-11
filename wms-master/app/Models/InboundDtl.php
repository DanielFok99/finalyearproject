<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InboundDtl
 *
 * @property int $id
 * @property int $inbound_id
 * @property int $product_sku_id
 * @property string $doc_uom
 * @property int $doc_quantity
 * @property int $uom_rate
 * @property string $base_uom
 * @property int $base_quantity
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Inbound|null $inbound
 * @property-read \App\Models\ProductSku|null $productSku
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl query()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereBaseQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereBaseUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereDocQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereDocUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereInboundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereProductSkuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereUomRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundDtl whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InboundDtl extends Model
{
    use HasFactory;

    protected $fillable = [
        'inbound_id', 'product_sku_id', 'doc_uom', 'doc_quantity',
        'uom_rate', 'base_uom', 'base_quantity', 'quantity',
    ];

    public function inbound()
    {
        return $this->belongsTo(Inbound::class);
    }

    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }
}
