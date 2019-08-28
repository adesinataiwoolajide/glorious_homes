<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class ContactAgents extends Model
{
    use SoftDeletes;
    use LogsActivity;
   
    protected $table = 'contact_agents';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'name','email', 'agent_id', 'content', 'phone_number'
    ];

    protected static $logAttributes = ['email', 'agent_id', 'phone_number', 'content'];

    public function getAgentIdAttribute($value){
        return ($value);
    }

    public function setAgentIdAttribute($value){
        return $this->attributes['agent_id'] = ($value);
    }

    public function getNameAttribute($value){
        return ucwords($value);
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }

    public function getEmailAttribute($value){
        return ucwords($value);
    }

    public function setEmailAttribute($value){
        return $this->attributes['email'] = ucwords($value);
    }

    public function getContentAttribute($value){
        return ucwords($value);
    }

    public function setContentAttribute($value){
        return $this->attributes['content'] = ucwords($value);
    }

    public function getPhoneNumberAttribute($value){
        return ($value);
    }

    public function setPhoneNumberAttribute($value){
        return $this->attributes['phone_number'] = ($value);
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

    public function agent(){
        return $this->hasMany('App\Agent', 'agent_id', 'contact_id');
    }
}
