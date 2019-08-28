<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Properties extends Model
{
    use SoftDeletes;
    use LogsActivity;
   
    protected $table = 'properties';
    protected $primaryKey = 'property_id';
    protected $fillable = [
        'property_name', 'property_category_id', 'amount', 'property_number', 'size', 'longitude', 
        'latitude', 'document_id', 'property_type_id', 'agent_id', 'status', 'state', 'lga', 
        'address', 'description', 'cover_image', 'purpose', 'property_condition', 'facility_id'
    ];

    protected static $logAttributes = ['property_number', 'agent_id', 'purpose'];
    
    public function getPropertyNameAttribute($value){
        return ucwords($value);
    }

    public function setPropertyNameAttribute($value){
        return $this->attributes['property_name'] = ucwords($value);
    }

    public function getPropertyConditionAttribute($value){
        return ucwords($value);
    }

    public function setPropertyConditionAttribute($value){
        return $this->attributes['property_condition'] = ucwords($value);
    }

    public function getFacilityIdAttribute($value){
        return ($value);
    }

    public function setFacilityIdAttribute($value){
        return $this->attributes['facility_id'] = ($value);
    }

    public function getCoverImageAttribute($value){
        return ucwords($value);
    }

    public function setPurposeAttribute($value){
        return $this->attributes['purpose'] = ucwords($value);
    }

    public function getPurposeAttribute($value){
        return ucwords($value);
    }

    public function setCoverImageAttribute($value){
        return $this->attributes['cover_image'] = ($value);
    }

    public function getDescriptionAttribute($value){
        return ucwords($value);
    }

    public function setDescriptionAttribute($value){
        return $this->attributes['description'] = ucwords($value);
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
        return $this->attributes['lga'] = ($value);
    }

    public function getAddressAttribute($value){
        return ($value);
    }

    public function setAddressAttribute($value){
        return $this->attributes['address'] = ($value);
    }

    public function getLongitudeAttribute($value){
        return ($value);
    }

    

    public function getLatitudeAttribute($value){
        return ($value);
    }
    public function setLongitudeAttribute($value){
        return $this->attributes['longitude'] = ($value);
    }

    public function setLatitudeAttribute($value){
        return $this->attributes['latitude'] = ($value);
    }

    public function getSizeAttribute($value){
        return ucwords($value);
    }

    public function setSizeAttribute($value){
        return $this->attributes['size'] = ($value);
    }

    public function getAmountAttribute($value){
        return ($value);
    }

    public function setAmountAttribute($value){
        return $this->attributes['amount'] = $value;
    }

    public function getStatusAttribute($value){
        return ($value);
    }

    public function setStatusAttribute($value){
        return $this->attributes['status'] = ($value);
    }

    public function getPropertyNumberAttribute($value){
        return strtoupper($value);
    }

    public function setPropertyNumberAttribute($value){
        return $this->attributes['property_number'] = strtoupper($value);
    }


    public function getAgentIdAttribute($value){
        return ($value);
    }

    public function setAgentIdAttribute($value){
        return $this->attributes['agent_id'] = ($value);
    }

    public function getDocumentIdAttribute($value){
        return ($value);
    }

    public function setDocumentIdAttribute($value){
        return $this->attributes['document_id'] = ($value);
    }

    public function getAgentCategoryIdAttribute($value){
        return ($value);
    }

    public function setAgentCategoryIdAttribute($value){
        return $this->attributes['agent_category_id'] = ($value);
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

    public function property_type(){
        return $this->belongsTo('App\PropertyTypes','property_type_id');
    }

    public function document(){
        return $this->belongsTo('App\PropertyDocument','document_id');
    }

    public function agent(){
        return $this->belongsTo('App\Agent','agent_id');
    }

    public function category(){
        return $this->belongsTo('App\PropertyCategories','property_category_id');
    }

    public function type(){
        return $this->belongsTo('App\PropertyTypes','property_type_id');
    }

   
}
