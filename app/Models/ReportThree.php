<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportThree extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'nephrology_count',
        'urinary_tract_infection_count',
        'renal_disease_count',
        'urolithiasis_count',
        'endocrinology_count',
        'hypoglycemia_count',
        'dyslipidemia_count',
        'diabetes_mellitus_count',
        'ob_gyne_count',
        'dysmenorrhea_count',
        'hormonal_imbalance_count',
        'pregnancy_count',
        'hematologic_count',
        'leukemia_count',
        'blood_dyscrasia_count',
        'anemia_count',
        'surgery_count',
        'lacerated_wound_count',
        'punctured_wound_count',
        'animal_bite_count',
        'superfacial_abrasions_count',
        'foreign_body_removal1_count',
        'allergology_count',
        'contact_dermatitis_count',
        'allergic_rhinitis_count',
        'bronchial_asthma_count',
        'hypersensitivity_count',
    ];

    //it belongs to
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
