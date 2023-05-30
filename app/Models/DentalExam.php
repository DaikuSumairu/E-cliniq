<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'date_created',
        'date_updated',
    ];
    
    //has relationship
    public function dental_exam_response()
    {
        return $this->hasOne(DentalExamResponse::class);
    }

    //it belongs to
    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
