<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitThree extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    //has relationship
    public function report()
    {
        return $this->hasMany(Report::class);
    }

    //it belongs to
    public function user()
    {
        return $this->belongsTo(Visit::class);
    }
}
