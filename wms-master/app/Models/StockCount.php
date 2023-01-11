<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StockCount
 *
 * @property int $id
 * @property int $location_id
 * @property string $job_title
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property string $remark
 * @property int $export_count
 * @property string $job_start
 * @property string $last_modified
 * @property int $job_created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Staff|null $createdBy
 * @property-read \App\Models\Location|null $location
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount query()
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereExportCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereJobCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereJobStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereLastModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockCount whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StockCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id', 'job_title', 'start_date', 'end_date',
        'status', 'remark', 'export_count', 'job_start',
        'last_modified', 'job_created_by',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Staff::class);
    }

}
