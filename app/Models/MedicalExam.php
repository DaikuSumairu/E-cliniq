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

    //has relationship
    public function past_medical_history()
    {
        return $this->hasOne(PastMedicalHistory::class);
    }
    public function family_history()
    {
        return $this->hasOne(FamilyHistory::class);
    }

    //it belongs to
    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
