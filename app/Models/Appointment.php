<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'school_id',
        'date',
        'start_time',
        'end_time',
        'reason',
        'status',
    ];

    //it belongs to
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
