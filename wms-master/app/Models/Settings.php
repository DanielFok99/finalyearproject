<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Settings
 *
 * @property int $id
 * @property string $time_format
 * @property string $date_format
 * @property string $currency_symbol
 * @property string $currency_format
 * @property string $thousand_separator
 * @property int|null $warehouse_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Warehouse|null $warehouse
 * @method static Builder|Settings newModelQuery()
 * @method static Builder|Settings newQuery()
 * @method static Builder|Settings query()
 * @method static Builder|Settings whereCreatedAt($value)
 * @method static Builder|Settings whereCurrencyFormat($value)
 * @method static Builder|Settings whereCurrencySymbol($value)
 * @method static Builder|Settings whereDateFormat($value)
 * @method static Builder|Settings whereId($value)
 * @method static Builder|Settings whereThousandSeparator($value)
 * @method static Builder|Settings whereTimeFormat($value)
 * @method static Builder|Settings whereUpdatedAt($value)
 * @method static Builder|Settings whereWarehouseId($value)
 * @mixin Eloquent
 */
class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_format', 'date_format', 'currency_symbol', 'currency_format',
        'thousand_separator', 'warehouse_id',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
