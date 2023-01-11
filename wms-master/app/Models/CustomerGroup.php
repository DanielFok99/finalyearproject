<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\CustomerGroup
 *
 * @property int $id
 * @property string $title
 * @property float $discount
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer[] $customers
 * @property-read int|null $customers_count
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'discount', 'is_default'
    ];

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

//    public static function getDefault()
//    {
//        return CustomerGroup::query()
//            ->where('is_default', true)->first();
//    }

    public static function updateDefault()
    {
        $oldGroup = CustomerGroup::where('is_default', true)->first();
        if ($oldGroup) {
            $oldGroup->update(['is_default' => false]);
            $oldGroup->save();
        }
    }
}
