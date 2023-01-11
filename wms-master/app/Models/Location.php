<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Location
 *
 * @property int $id
 * @property int $warehouse_id
 * @property string $code
 * @property string $name
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Warehouse|null $warehouse
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereWarehouseId($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id', 'code', 'name', 'is_active',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
