<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportThree extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitthree_id',
        'nephrology',
        'urinary_tract_infection',
        'renal_disease',
        'urolithiasis',
        'endocrinology',
        'hypoglycemia',
        'dyslipidemia',
        'diabetes_mellitus',
        'ob_gyne',
        'dysmenorrhea',
        'hormonal_imbalance',
        'pregnancy',
        'hematologic',
        'leukemia',
        'blood_dyscrasia',
        'anemia',
        'surgery',
        'lacerated_wound',
        'punctured_wound',
        'animal_bite',
        'superfacial_abrasions',
        'foreign_body_removal1',
        'allergology',
        'contact_dermatitis',
        'allergic_rhinitis',
        'bronchial_asthma',
        'hypersensitivity',
    ];

    //it belongs to
    public function visitthree()
    {
        return $this->belongsTo(VisitThree::class);
    }
}
