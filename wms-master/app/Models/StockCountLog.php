<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\StockCountLog
 *
 * @property int $id
 * @property int $stock_count_id
 * @property int $location_id
 * @property int $device_id
 * @property int $staff_id
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Device|null $device
 * @property-read Location|null $location
 * @property-read Staff|null $staff
 * @property-read StockCount|null $stockCount
 * @method static Builder|StockCountLog newModelQuery()
 * @method static Builder|StockCountLog newQuery()
 * @method static Builder|StockCountLog query()
 * @method static Builder|StockCountLog whereCreatedAt($value)
 * @method static Builder|StockCountLog whereDeviceId($value)
 * @method static Builder|StockCountLog whereId($value)
 * @method static Builder|StockCountLog whereLocationId($value)
 * @method static Builder|StockCountLog whereStaffId($value)
 * @method static Builder|StockCountLog whereStatus($value)
 * @method static Builder|StockCountLog whereStockCountId($value)
 * @method static Builder|StockCountLog whereUpdatedAt($value)
 * @mixin Eloquent
 */
class StockCountLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_count_id', 'location_id', 'device_id', 'staff_id',
        'status',
    ];

    public function stockCount()
    {
        return $this->belongsTo(StockCount::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
