<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_exam_id',
        'height',
        'weight',
        'bp1',
        'bp2',
        'cardiac_rate',
        'respiratory_rate',
        'bmi',
        'general_appearance',
        'skin1',
        'head_and_scalp',
        'eyes',
        'corrected',
        'pupils',
        'ear_eardrums',
        'nose_sinuses',
        'mouth_throat',
        'neck_thyroid',
        'chest_breast_axilla',
        'heart_cardiovascular',
        'lungs_respiratory',
        'abdomen',
        'back_flanks',
        'anus_rectum',
        'genito_urinary_system',
        'inguinal_genitals',
        'musculo_skeletal1',
        'extremities',
        'reflexes',
        'neurological',
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
