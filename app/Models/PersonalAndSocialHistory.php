<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAndSocialHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_exam_id',
        'smoker',
        'stick',
        'pack',
        'alcoholic',
        'frequent',
        'week',
        'medication',
        'take',
        'hospitalization',
        'hosp_times',
        'operation',
        'op_times',
    ];

    //it belongs to
    public function medical_exam()
    {
        return $this->belongsTo(MedicalExam::class);
    }
}
