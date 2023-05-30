<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_created',
        'date_updated',
        'birth_date',
        'age',
        'sex',
        'civil_status',
        'address',
        'mobile_number',
        'contact_person',
        'contact_person_number',
    ];

    //has relationship
    public function medical_exam()
    {
        return $this->hasOne(MedicalExam::class);
    }
    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }

    //it belongs to
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
