<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'musculo_skeletal_count',
        'ligament_sprain_count',
        'muscle_strain_count',
        'costrochondritis_count',
        'soft_tissue_contusion_count',
        'fracture_count',
        'gouty_arthritis_count',
        'plantar_fasciitis_count',
        'dislocation_count',
        'opthalmology_count',
        'conjunctivitis_count',
        'stye_count',
        'foreign_body_count',
        'ent_count',
        'stomatitis_count',
        'epistaxis_count',
        'otitis_media_count',
        'foreign_body_removal_count',
        'neurology_count',
        'tension_headache_count',
        'migraine_count',
        'vertigo_count',
        'hyperventilation_syndrome_count',
        'insomnia_count',
        'seizure_count',
        'bell_palsy_count',
        'dermatology_count',
        'folliculitis_count',
        'carbuncle_count',
        'burn_count',
        'wound_dressing_count',
        'infected_wound_count',
        'blister_wound_count',
        'seborrheic_dermatitis_count',
        'bruise_count',
    ];

    //it belongs to
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
