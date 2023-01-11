<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $company_email
 * @property string $company_name
 * @property string $company_contact
 * @property string $company_address
 * @property string $tin_number
 * @property int $conpanyable_id
 * @property string $conpanyable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $companyable
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereConpanyableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereConpanyableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTinNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_email', 'company_name', 'company_contact', 'company_address',
        'tin_number', 'conpanyable_id', 'conpanyable_type',
    ];

    public function companyable(): MorphTo
    {
        return $this->morphTo();
    }
}
