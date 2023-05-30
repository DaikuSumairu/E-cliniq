<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalExamRestoration extends Model
{
    use HasFactory;

    protected $fillable = [
        'dental_exam_response_id',
        'restoration_lt1',
        'restoration_lt2',
        'restoration_lt3',
        'restoration_lt4',
        'restoration_lt5',
        'restoration_lt6',
        'restoration_lt7',
        'restoration_lt8',
        'restoration_lb1',
        'restoration_lb2',
        'restoration_lb3',
        'restoration_lb4',
        'restoration_lb5',
        'restoration_lb6',
        'restoration_lb7',
        'restoration_lb8',
        'restoration_rt1',
        'restoration_rt2',
        'restoration_rt3',
        'restoration_rt4',
        'restoration_rt5',
        'restoration_rt6',
        'restoration_rt7',
        'restoration_rt8',
        'restoration_rb1',
        'restoration_rb2',
        'restoration_rb3',
        'restoration_rb4',
        'restoration_rb5',
        'restoration_rb6',
        'restoration_rb7',
        'restoration_rb8',
    ];

    //it belongs to
    public function dental_exam_response()
    {
        return $this->belongsTo(DentalExamResponse::class);
    }
}
