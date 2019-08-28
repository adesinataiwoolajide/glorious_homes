<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Agent extends Model
{
    use SoftDeletes;
    use LogsActivity;
   
    protected $table = 'agents';
    protected $primaryKey = 'agent_id';
    protected $fillable = [
        'agent_name', 'email', 'state', 'lga', 'passport', 'agent_category_id', 
        'phone_number', 'description'
    ];
    protected static $logAttributes = ['agent_name', 'email'];

    public function getAgentNameAttribute($value){
        return ucwords($value);
    }

    public function setAgentNameAttribute($value){
        return $this->attributes['agent_name'] = ucwords($value);
    }

    public function getEmailAttribute($value){
        return $value;
    }

    public function setEmailAttribute($value){
        return $this->attributes['email'] = $value;
    }

    public function getPhoneNumberAttribute($value){
        return $value;
    }

    public function setPhoneNumberAttribute($value){
        return $this->attributes['phone_number'] = $value;
    }

    public function getPassportAttribute($value){
        return $value;
    }

    public function setPassportAttribute($value){
        return $this->attributes['passport'] = $value;
    }

    public function getStateAttribute($value){
        return ucwords($value);
    }

    public function setStateAttribute($value){
        return $this->attributes['state'] = ucwords($value);
    }

    public function getLgaAttribute($value){
        return ucwords($value);
    }

    public function setLgaAttribute($value){
        return $this->attributes['lga'] = ucwords($value);
    }

    public function getDescriptionAttribute($value){
        return ucwords($value);
    }

    public function settDescriptionAttribute($value){
        return $this->attributes['description'] = ($value);
    }

    public function getAgentCategoryIdAttribute($value){
        return ucwords($value);
    }

    public function setAgentCategoryIdAttribute($value){
        return $this->attributes['agent_category_id'] = ucwords($value);
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

    public function agent_category(){
        return $this->belongsTo('App\AgentCategories','agent_category_id');
    }

    public function property(){
        return $this->hasMany('App\Properties','agent_id');
    }

    public function subscription(){
        return $this->hasMany('App\AgentSubscriptions','agent_id', 'subscription_id');
    }
}
