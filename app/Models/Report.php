<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'day',
    ];

    //it belongs to
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
