<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'complaint',
        'pulse',
        'oxygen',
        'respiratory_rate',
        'bp1',
        'bp2',
        'temperature',
        'treatment',
        'remarks',
    ];

    //it belongs to
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
