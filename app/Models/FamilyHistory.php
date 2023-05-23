<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_exam_id',
        'bronchial_asthma_1',
        'diabetes_melilitus_1',
        'thyroid_disorder_1',
        'opthalmologic_disease',
        'cancer',
        'cardiac_disorder_1',
        'hypertension_1',
        'tuberculosis_1',
        'nervous_disorder',
        'musculoskeletal',
        'liver_disease',
        'kidney_disease',
        'others_1',
    ];
    
    public function family_history_positive()
    {
        return $this->hasOne(FamilyHistoryPositive::class);
    }
    

    public function medical_exam()
    {
        return $this->belongsTo(MedicalExam::class);
    }

}
