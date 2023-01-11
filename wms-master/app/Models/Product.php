<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $brand_id
 * @property int|null $group_id
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\ProductBrand|null $brand
 * @property-read \App\Models\ProductCategory|null $category
 * @property-read \App\Models\ProductGroup|null $group
 * @property-read Collection|\App\Models\ProductSku[] $productSkus
 * @property-read int|null $product_skus_count
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereBrandId($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereCreatedBy($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereGroupId($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereTitle($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'brand_id',
        'group_id', 'created_by',
    ];

    public function category()
    {
        return $this->hasOne(ProductCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class);
    }

    public function group()
    {
        return $this->belongsTo(ProductGroup::class);
    }

    public function productSkus()
    {
        return $this->hasMany(ProductSku::class);
    }

}
