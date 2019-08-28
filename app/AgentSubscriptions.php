<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class AgentSubscriptions extends Model
{
    //

    use SoftDeletes;
    use LogsActivity;
   
    protected $table = 'agent_subscriptions';
    protected $primaryKey = 'subscription_id';
    protected $fillable = [
        'agent_id', 'year', 'amount', 'expire_on', 'type', 'month'
    ];
    protected static $logAttributes = ['agent_id', 'year', 'amount', 'type', 'month'];

    public function getAgentIdAttribute($value){
        return ($value);
    }

    public function setAgentIdAttribute($value){
        return $this->attributes['agent_id'] = ($value);
    }

    public function getYearAttribute($value){
        return ($value);
    }

    public function setAgYearAttribute($value){
        return $this->attributes['year'] = ($value);
    }

    public function getAmountAttribute($value){
        return ($value);
    }

    public function setAmountAttribute($value){
        return $this->attributes['amount'] = ($value);
    }

    public function getTypeAttribute($value){
        return ($value);
    }

    public function setTypeAttribute($value){
        return $this->attributes['type'] = ($value);
    }

    public function getMonthAttribute($value){
        return ($value);
    }

    public function setMonthAttribute($value){
        return $this->attributes['month'] = ($value);
    }

    public function getExpireOnAttribute($value){
        return ($value);
    }

    public function setExpireOnAttribute($value){
        return $this->attributes['expire_on'] = ($value);
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-M-Y');
    }

    public function getDeletedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-M-Y');
    }

    public function getUpdatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-M-Y');
    }

    public function agent(){
        return $this->belongsTo('App\Agent', 'agent_id');
    }
}
