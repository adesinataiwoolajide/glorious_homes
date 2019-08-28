<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class PropertyImages extends Model
{
    use SoftDeletes;
    use LogsActivity;
    
    protected $table = 'prop_images';
    protected $primaryKey = 'image_id';
    protected $fillable = [
        'image', 'property_number'
    ];
    public function getImageAttribute($value){
        return ($value);
    }

    public function setImageAttribute($value){
        return $this->attributes['image'] = ($value);
    }


    public function getPropertyNumberAttribute($value){
        return strtoupper($value);
    }

    public function setPropertyNumberAttribute($value){
        return $this->attributes['property_number'] = strtoupper($value);
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
    protected static $logAttributes = ['property_number'];
}
