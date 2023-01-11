<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $customer_name
 * @property string $customer_contact
 * @property string|null $ic_number
 * @property string $email
 * @property string|null $avatar
 * @property string|null $note
 * @property string $status
 * @property int $customer_group_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Company[] $company
 * @property-read int|null $company_count
 * @property-read \App\Models\CustomerGroup|null $customerGroup
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereIcNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'customer_contact', 'ic_number', 'email',
        'avatar', 'note', 'status', 'customer_group_id',
        'created_by',
    ];

    public function customerGroup(): BelongsTo
    {
        return $this->belongsTo(CustomerGroup::class);
    }

    public function company(): MorphMany
    {
        return $this->morphMany(Company::class,'companyable');
    }


}
