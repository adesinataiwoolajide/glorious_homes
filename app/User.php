<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $primaryKey = 'user_id';
    protected $guard_name = 'web';
    protected $fillable = [
        'name', 'email', 'password', 'role', 'status',
    ];
    protected static $logAttributes = ['name', 'email', 'deleted_at'];

    public function getNameAttribute($value){
        return ucwords($value);
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }

    public function getEmailAttribute($value){
        return $value;
    }

    public function setEmailAttribute($value){
        return $this->attributes['email'] = $value;
    }

    public function getPasswordAttribute($value){
        return $value;
    }

    public function setPasswordAttribute($value){
        return $this->attributes['password'] = $value;
    }

    public function getRoleAttribute($value){
        return $value;
    }

    public function setRoleAttribute($value){
        return $this->attributes['role'] = $value;
    }

    public function getStatusAttribute($value){
        return $value;
    }

    public function setStatusAttribute($value){
        return $this->attributes['status'] = $value;
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getDeletedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'role' => 'array',
    ];
}
