<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class PropertyCategories extends Model
{
    use SoftDeletes;
    use LogsActivity;
    
    protected $table = 'property_categories';
    protected $primaryKey = 'property_category_id';
    protected $fillable = [
        'property_category_name',
    ];
    protected static $logAttributes = ['property_category_name'];

    public function getPropertyCategoryNameAttribute($value){
        return ucwords($value);
    }

    public function setPropertyCategoryNameAttribute($value){
        return $this->attributes['property_category_name'] = strtolower($value);
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

    public function property_types(){
        return $this->hasMany('App\PropertyTypes', 'property_type_id', 'property_category_id');
    }

    public function property(){
        return $this->hasMany('App\Properties', 'property_id', 'property_category_id');
    }
}
