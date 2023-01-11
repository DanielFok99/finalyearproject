<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Supplier
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $contact_number
 * @property string $address
 * @property string $tin_number
 * @property string $status
 * @property string $note
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereTinNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supplier extends Model
{
    use HasFactory;

//    protected $fillable = [
//        'person_in_charge_name', 'person_in_charge_contact', 'avatar', 'note',
//        'status', 'company_id', 'created_by',
//    ];

    protected $fillable = [
        'name', 'email', 'contact_number', 'address',
        'tin_number', 'status', 'note', 'created_by',
    ];

//    public function company(): MorphMany
//    {
//        return $this->morphMany(Company::class, 'companyable');
//    }
}
