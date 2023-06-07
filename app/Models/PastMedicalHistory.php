<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastMedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_exam_id',
        'allergies',
        'skin_disease',
        'opthalmologic_disorder',
        'ent_disorder',
        'bronchial_asthma',
        'cardiac_disorder',
        'diabetes_melilitus',
        'chronic_headache_or_migraine',
        'hepatitis',
        'hypertension',
        'thyroid_disorder',
        'blood_disorder',
        'tuberculosis',
        'peptic_ulcer',
        'musculoskeletal_disorder',
        'infectious_disease',
        'others',
    ];

    //has relationship
    public function medical_exam_response()
    {
        return $this->hasOne(MedicalExamResponse::class);
    }

    //it belongs to
    public function medical_exam()
    {
        return $this->belongsTo(MedicalExam::class);
    }
}
