<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Staff
 *
 * @property int $id
 * @property string $name
 * @property string $contact
 * @property string $email
 * @property string $gender
 * @property int $roles_id
 * @property int $warehouse_id
 * @property string $status
 * @property string $avatar
 * @property int $created_by
 * @property int $is_verified
 * @property string $password
 * @property int $is_admin
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Role|null $role
 * @property-read Warehouse|null $warehouse
 * @method static Builder|Staff newModelQuery()
 * @method static Builder|Staff newQuery()
 * @method static Builder|Staff query()
 * @method static Builder|Staff whereAvatar($value)
 * @method static Builder|Staff whereContact($value)
 * @method static Builder|Staff whereCreatedAt($value)
 * @method static Builder|Staff whereCreatedBy($value)
 * @method static Builder|Staff whereEmail($value)
 * @method static Builder|Staff whereGender($value)
 * @method static Builder|Staff whereId($value)
 * @method static Builder|Staff whereIsAdmin($value)
 * @method static Builder|Staff whereIsVerified($value)
 * @method static Builder|Staff whereName($value)
 * @method static Builder|Staff wherePassword($value)
 * @method static Builder|Staff whereRememberToken($value)
 * @method static Builder|Staff whereRolesId($value)
 * @method static Builder|Staff whereStatus($value)
 * @method static Builder|Staff whereUpdatedAt($value)
 * @method static Builder|Staff whereWarehouseId($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 */
class Staff extends Authenticatable
{
    use HasFactory,HasApiTokens;

    protected $fillable = [
        'name', 'contact', 'email', 'gender',
        'roles_id', 'warehouse_id', 'status', 'avatar',
        'created_by', 'is_verified', 'password', 'is_admin',
        'remember_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class,'roles_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

//    public static function isAdmin(Staff $staff){
//        return $staff->role->title == 'admin';
//    }
}
