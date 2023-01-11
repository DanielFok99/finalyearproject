<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Device
 *
 * @property int $id
 * @property string $device_id
 * @property string $manufacturer
 * @property string $brand
 * @property string $model
 * @property string $machine_id
 * @property int $is_enabled
 * @property string $expired_date
 * @property int $warehouse_id
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Warehouse|null $warehouse
 * @method static Builder|Device newModelQuery()
 * @method static Builder|Device newQuery()
 * @method static Builder|Device query()
 * @method static Builder|Device whereBrand($value)
 * @method static Builder|Device whereCreatedAt($value)
 * @method static Builder|Device whereCreatedBy($value)
 * @method static Builder|Device whereDeviceId($value)
 * @method static Builder|Device whereExpiredDate($value)
 * @method static Builder|Device whereId($value)
 * @method static Builder|Device whereIsEnabled($value)
 * @method static Builder|Device whereMachineId($value)
 * @method static Builder|Device whereManufacturer($value)
 * @method static Builder|Device whereModel($value)
 * @method static Builder|Device whereUpdatedAt($value)
 * @method static Builder|Device whereWarehouseId($value)
 * @mixin Eloquent
 */
class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id', 'manufacturer', 'brand', 'model',
        'machine_id', 'is_enabled', 'expired_date', 'warehouse_id',
        'created_by',
    ];


    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

}
