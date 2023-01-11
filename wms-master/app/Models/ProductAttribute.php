<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductAttribute
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|ProductAttribute newModelQuery()
 * @method static Builder|ProductAttribute newQuery()
 * @method static Builder|ProductAttribute query()
 * @method static Builder|ProductAttribute whereCreatedAt($value)
 * @method static Builder|ProductAttribute whereCreatedBy($value)
 * @method static Builder|ProductAttribute whereId($value)
 * @method static Builder|ProductAttribute whereName($value)
 * @method static Builder|ProductAttribute whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'created_by'
    ];


}
