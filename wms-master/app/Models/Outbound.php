<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Outbound
 *
 * @property int $id
 * @property string $doc_num
 * @property int|null $sales_order_id
 * @property string $doc_time
 * @property string $insert_time
 * @property string $complete_time
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SalesOrderDetail[] $details
 * @property-read int|null $details_count
 * @property-read \App\Models\SalesOrder|null $salesOrder
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound query()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereCompleteTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereDocNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereDocTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereInsertTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereSalesOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbound whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Outbound extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_num', 'sales_order_id', 'doc_time', 'insert_time',
        'complete_time', 'status',
    ];

    public function details()
    {
        return $this->hasMany(SalesOrderDetail::class);
    }

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }
}
