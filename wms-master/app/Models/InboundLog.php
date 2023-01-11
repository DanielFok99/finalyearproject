<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InboundLog
 *
 * @property int $id
 * @property int $inbound_id
 * @property int $location_id
 * @property int $device_id
 * @property int $staff_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\InboundLogDetail[] $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Device|null $device
 * @property-read \App\Models\Inbound|null $inbound
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Models\Staff|null $staff
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereInboundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InboundLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InboundLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'inbound_id', 'location_id', 'device_id', 'staff_id',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(InboundLogDetail::class);
    }

    public function inbound()
    {
        return $this->belongsTo(Inbound::class);
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
