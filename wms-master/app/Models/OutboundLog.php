<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OutboundLog
 *
 * @property int $id
 * @property int $outbound_id
 * @property int $location_id
 * @property int $device_id
 * @property int $staff_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OutboundLogDetail[] $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Device|null $device
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Models\Outbound|null $outbound
 * @property-read \App\Models\Staff|null $staff
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereOutboundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OutboundLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OutboundLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'outbound_id', 'location_id', 'device_id', 'staff_id',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(OutboundLogDetail::class);
    }

    public function outbound()
    {
        return $this->belongsTo(Outbound::class);
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
