<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropImages extends Model
{
    public function getPropertyNumberAttribute($value){
        return strtoupper($value);
    }

    public function setPropertyNumberAttribute($value){
        return $this->attributes['property_number'] = strtoupper($value);
    }

    public function getImageAttribute($value){
        return strtoupper($value);
    }

    public function setImageAttribute($value){
        return $this->attributes['image'] = strtoupper($value);
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
}
