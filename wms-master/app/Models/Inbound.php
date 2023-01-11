<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inbound
 *
 * @property int $id
 * @property string $doc_num
 * @property int|null $purchase_order_id
 * @property string $doc_time
 * @property string $insert_time
 * @property string $complete_time
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PurchaseOrder|null $purchaseOrder
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereCompleteTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereDocNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereDocTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereInsertTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound wherePurchaseOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbound whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inbound extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_num', 'purchase_order_id', 'doc_time', 'insert_time',
        'complete_time', 'status',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
