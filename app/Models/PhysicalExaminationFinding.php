<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalExaminationFinding extends Model
{
    use HasFactory;

    protected $fillable = [
        'physical_examination_id',
        '1_findings1',
        '2_findings1',
        '3_findings1',
        'od_findings1',
        'od1_findings1',
        'os_findings1',
        'os1_findings1',
        'od_findings2',
        'od1_findings2',
        'os_findings2',
        'os1_findings2',
        '6_findings1',
        '7_findings1',
        '8_findings1',
        '9_findings1',
        '10_findings1',
        '11_findings1',
        '12_findings1',
        '13_findings1',
        '14_findings1',
        '15_findings1',
        '16_findings1',
        '17_findings1',
        '18_findings1',
        '19_findings1',
        '20_findings1',
        '21_findings1',
        '22_findings1',
        'daignosis',
    ];

    //it belongs to
    public function physical_examination()
    {
        return $this->hasOne(ReviewOfSystem::class);
    }
}
