<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;



/**
 * App\Models\ProductUnit
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $is_default
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProductUnit newModelQuery()
 * @method static Builder|ProductUnit newQuery()
 * @method static Builder|ProductUnit query()
 * @method static Builder|ProductUnit whereCreatedAt($value)
 * @method static Builder|ProductUnit whereCreatedBy($value)
 * @method static Builder|ProductUnit whereId($value)
 * @method static Builder|ProductUnit whereIsDefault($value)
 * @method static Builder|ProductUnit whereName($value)
 * @method static Builder|ProductUnit whereShortName($value)
 * @method static Builder|ProductUnit whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProductUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'short_name', 'is_default', 'created_by'
    ];

    public static function updateDefault()
    {
        $oldUnit = ProductUnit::where('is_default', true)->first();
        if ($oldUnit) {
            $oldUnit->update(['is_default' => false]);
            $oldUnit->save();
        }
    }
}
