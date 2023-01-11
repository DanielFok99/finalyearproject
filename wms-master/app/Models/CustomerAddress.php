<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CustomerAddress
 *
 * @property int $id
 * @property int $customer_id
 * @property string $address
 * @property string $postcode
 * @property string $status
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'address', 'postcode', 'status','is_default',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
