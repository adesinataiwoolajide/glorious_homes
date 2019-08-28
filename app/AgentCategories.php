<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class AgentCategories extends Model
{
    use SoftDeletes;
    use LogsActivity;
   
    protected $table = 'agent_categories';
    protected $primaryKey = 'agent_category_id';
    protected $fillable = [
        'agent_category_name',
    ];
    protected static $logAttributes = ['agent_category_name'];

    public function getAgentCategoryNameAttribute($value){
        return ucwords($value);
    }

    public function setAgentCategoryNameAttribute($value){
        return $this->attributes['agent_category_name'] = ucwords($value);
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
        return $this->hasMany('App\Agent', 'agent_id', 'agent_category_id');
    }

    
}
