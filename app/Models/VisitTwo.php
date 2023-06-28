<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'musculo_skeletal',
        'ligament_sprain',
        'muscle_strain',
        'costrochondritis',
        'soft_tissue_contusion',
        'fracture',
        'gouty_arthritis',
        'plantar_fasciitis',
        'dislocation',
        'opthalmology',
        'conjunctivitis',
        'stye',
        'foreign_body',
        'ent',
        'stomatitis',
        'epistaxis',
        'otitis_media',
        'foreign_body_removal',
        'neurology',
        'tension_headache',
        'migraine',
        'vertigo',
        'hyperventilation_syndrome',
        'insomnia',
        'seizure',
        'bell_palsy',
        'dermatology',
        'folliculitis',
        'carbuncle',
        'burn',
        'wound_dressing',
        'infected_wound',
        'blister_wound',
        'seborrheic_dermatitis',
        'bruise',
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
