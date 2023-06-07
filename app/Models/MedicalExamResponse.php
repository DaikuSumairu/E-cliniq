<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExamResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'past_medical_history_id',
        'family_history_id',
        'ob_gyne_history_id',
        'review_of_system_id',
        'physical_examination_id',
        
        //Past Medical History
        '1_pm_respond',
        '2_pm_respond',
        '3_pm_respond',
        '4_pm_respond',
        '5_pm_respond',
        '6_pm_respond',
        '7_pm_respond',
        '8_pm_respond',
        '9_pm_respond',
        '10_pm_respond',
        '11_pm_respond',
        '12_pm_respond',
        '13_pm_respond',
        '14_pm_respond',
        '15_pm_respond',
        '16_pm_respond',
        'others_pm_respond',

        //Family History
        '1_fh_respond',
        '2_fh_respond',
        '3_fh_respond',
        '4_fh_respond',
        '5_fh_respond',
        '6_fh_respond',
        '7_fh_respond',
        '8_fh_respond',
        '9_fh_respond',
        '10_fh_respond',
        '11_fh_respond',
        '12_fh_respond',
        'others_fh_respond',

        //OB-GYNE History
        '1_ob_respond',
        '2_ob_respond',
        '3_ob_respond',
        '4_ob_respond',
        '5_ob_respond',

        //Review of System
        '1_rs_respond',
        '2_rs_respond',
        '3_rs_respond',
        '4_rs_respond',
        '5_rs_respond',
        '6_rs_respond',
        '7_rs_respond',
        '8_rs_respond',
        '9_rs_respond',
        '10_rs_respond',

        //Physical Examination
        '1_pe_respond',
        '2_pe_respond',
        '3_pe_respond',
        'od_pe_respond',
        'od1_pe_respond',
        'os_pe_respond',
        'os1_pe_respond',
        'od_pe_respond1',
        'od1_pe_respond1',
        'os_pe_respond1',
        'os1_pe_respond1',
        '6_pe_respond',
        '7_pe_respond',
        '8_pe_respond',
        '9_pe_respond',
        '10_pe_respond',
        '11_pe_respond',
        '12_pe_respond',
        '13_pe_respond',
        '14_pe_respond',
        '15_pe_respond',
        '16_pe_respond',
        '17_pe_respond',
        '18_pe_respond',
        '19_pe_respond',
        '20_pe_respond',
        '21_pe_respond',
        '22_pe_respond',
        'diagnosis',
    ];

    //it belongs to
    public function past_medical_history()
    {
        return $this->belongsTo(PastMedicalHistory::class);
    }
    public function family_history()
    {
        return $this->belongsTo(FamilyHistory::class);
    }
    public function ob_gyne_history()
    {
        return $this->belongsTo(OBGyneHistory::class);
    }
    public function review_of_system()
    {
        return $this->belongsTo(ReviewOfSystem::class);
    }
    public function physical_examination()
    {
        return $this->hasOne(ReviewOfSystem::class);
    }
}
