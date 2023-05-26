<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObGyneHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_exam_id',
        'lnmp',
        'ob_score',
        'abnormal_pregnancies',
        'date_of_last_delivery',
        'breast_uterus_ovaries',
    ];
    
    //has relationship
    public function ob_gyne_history_positive()
    {
        return $this->hasOne(OBGyneHistoryPositive::class);
    }

    //it belongs to
    public function medical_exam()
    {
        return $this->belongsTo(MedicalExam::class);
    }
}
