<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'date_created',
        'date_updated',
    ];
    
    //has relationship
    public function consultaion_response()
    {
        return $this->hasOne(ConsultationResponse::class);
    }

    //it belongs to
    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
