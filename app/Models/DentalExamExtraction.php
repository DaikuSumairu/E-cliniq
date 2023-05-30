<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalExamExtraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'dental_exam_response_id',
        'extraction_lt1',
        'extraction_lt2',
        'extraction_lt3',
        'extraction_lt4',
        'extraction_lt5',
        'extraction_lt6',
        'extraction_lt7',
        'extraction_lt8',
        'extraction_lb1',
        'extraction_lb2',
        'extraction_lb3',
        'extraction_lb4',
        'extraction_lb5',
        'extraction_lb6',
        'extraction_lb7',
        'extraction_lb8',
        'extraction_rt1',
        'extraction_rt2',
        'extraction_rt3',
        'extraction_rt4',
        'extraction_rt5',
        'extraction_rt6',
        'extraction_rt7',
        'extraction_rt8',
        'extraction_rb1',
        'extraction_rb2',
        'extraction_rb3',
        'extraction_rb4',
        'extraction_rb5',
        'extraction_rb6',
        'extraction_rb7',
        'extraction_rb8',
    ];

    //it belongs to
    public function dental_exam_response()
    {
        return $this->belongsTo(DentalExamResponse::class);
    }
}
