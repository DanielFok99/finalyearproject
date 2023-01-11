<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProductCategory newModelQuery()
 * @method static Builder|ProductCategory newQuery()
 * @method static Builder|ProductCategory query()
 * @method static Builder|ProductCategory whereCreatedAt($value)
 * @method static Builder|ProductCategory whereCreatedBy($value)
 * @method static Builder|ProductCategory whereId($value)
 * @method static Builder|ProductCategory whereName($value)
 * @method static Builder|ProductCategory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'created_by'
    ];
}
