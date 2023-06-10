<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalExamResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'dental_exam_id',
        'oral_hygiene',
        'gingival_color',
        'consistency_of_the_gingival',
        'oral_prophylaxis',
        'restoration',
        'extraction',
        'prosthodontic_restoration',
        'orthodontist',
    ];

    //has relationship
    public function dental_exam_restoration()
    {
        return $this->hasOne(DentalExamRestoration::class);
    }
    public function dental_exam_extraction()
    {
        return $this->hasOne(DentalExamExtraction::class);
    }

    //it belongs to
    public function dental_exam()
    {
        return $this->belongsTo(DentalExam::class);
    }
}
