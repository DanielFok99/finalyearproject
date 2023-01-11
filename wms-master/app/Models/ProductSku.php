<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ProductSku
 *
 * @property int $id
 * @property string|null $sku
 * @property string|null $alternative_code
 * @property int $product_id
 * @property string $title
 * @property string $ref_purchase_price
 * @property string $ref_selling_price
 * @property int $enabled
 * @property string|null $barcode
 * @property string|null $image_url
 * @property int $is_default
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereAlternativeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereRefPurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereRefSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSku whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductSku extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku', 'alternative_code', 'product_id', 'title',
        'ref_purchase_price', 'ref_selling_price', 'enabled',
        'barcode', 'image_url', 'is_default','created_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
