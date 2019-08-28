<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Facilities extends Model
{
    use SoftDeletes;
    use LogsActivity;
   
    protected $table = 'facilities';
    protected $primaryKey = 'facility_id';
    protected $fillable = [
        'facility_name',
    ];

    protected static $logAttributes = ['facility_name'];

    public function getFacilityNameAttribute($value){
        return ucwords($value);
    }

    public function setFacilityNameAttribute($value){
        return $this->attributes['facility_name'] = ucwords($value);
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

    public function property(){
        return $this->hasMany('App\Properties', 'facility_id', 'property_id');
    }
}
