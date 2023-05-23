<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'date_created',
        'date_updated',
    ];

    public function past_medical_history()
    {
        return $this->hasOne(PastMedicalHistory::class);
    }

    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
