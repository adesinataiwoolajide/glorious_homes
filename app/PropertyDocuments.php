<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class PropertyDocuments extends Model
{
    use SoftDeletes;
    use LogsActivity;
    
    protected $table = 'property_documents';
    protected $primaryKey = 'document_id';
    protected $fillable = [
        'document_name',
    ];
    protected static $logAttributes = ['document_name'];

    public function getDocumentNameAttribute($value){
        return ucwords($value);
    }

    public function setDocumentNameAttribute($value){
        return $this->attributes['document_name'] = strtolower($value);
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
        return $this->hasMany('App\Properties', 'property_id', 'document_id');
    }
}
