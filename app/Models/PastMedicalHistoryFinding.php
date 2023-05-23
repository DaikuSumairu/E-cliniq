<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastMedicalHistoryFinding extends Model
{
    use HasFactory;

    protected $fillable = [
        'past_medical_history_id',
        '1_findings',
        '2_findings',
        '3_findings',
        '4_findings',
        '5_findings',
        '6_findings',
        '7_findings',
        '8_findings',
        '9_findings',
        '10_findings',
        '11_findings',
        '12_findings',
        '13_findings',
        '14_findings',
        '15_findings',
        '16_findings',
        'others_findings',
    ];

    public function past_medical_history()
    {
        return $this->belongsTo(PastMedicalHistory::class);
    }
}
