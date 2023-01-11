<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductGroup
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'created_by'
    ];
}
