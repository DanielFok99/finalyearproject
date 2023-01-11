<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProductBrand
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProductBrand newModelQuery()
 * @method static Builder|ProductBrand newQuery()
 * @method static Builder|ProductBrand query()
 * @method static Builder|ProductBrand whereCreatedAt($value)
 * @method static Builder|ProductBrand whereCreatedBy($value)
 * @method static Builder|ProductBrand whereId($value)
 * @method static Builder|ProductBrand whereName($value)
 * @method static Builder|ProductBrand whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProductBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'created_by'
    ];
}
