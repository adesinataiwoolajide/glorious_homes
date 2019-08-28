<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class PropertyTypes extends Model
{
    use SoftDeletes;
    use LogsActivity;
    
    protected $table = 'property_types';
    protected $primaryKey = 'property_type_id';
    protected $fillable = [
        'property_type_name','property_category_id'
    ];
    protected static $logAttributes = ['property_type_name', 'property_category_id'];

    public function getPropertyTypeNameAttribute($value){
        return ucwords($value);
    }

    public function getPropertyCategoryIdAttribute($value){
        return $value;
    }

    public function setPropertyTypeNameAttribute($value){
        return $this->attributes['property_type_name'] = ucwords($value);
    }

    public function setPropertyCAtegoryIdAttribute($value){
        return $this->attributes['property_category_id'] = $value;
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

    public function property_category(){
        return $this->belongsTo('App\PropertyCategories', 'property_category_id');
    }

    public function property_type(){
        return $this->belongsTo('App\PropertyTypes', 'property_type_id');
    }
}
