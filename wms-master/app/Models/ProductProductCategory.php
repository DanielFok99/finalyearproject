<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductProductCategory
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','product_category_id'
    ];
}
