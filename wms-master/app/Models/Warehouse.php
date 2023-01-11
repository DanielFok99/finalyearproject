<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Warehouse
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $is_default
 * @property string|null $contact_number
 * @property int|null $person_in_charge_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Staff|null $personInCharge
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse wherePersonInChargeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'is_default', 'contact_number',
        'person_in_charge_id',

    ];

    public function personInCharge()
    {
        return $this->belongsTo(Staff::class, 'person_in_charge_id');
    }
}
