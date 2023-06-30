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

    //has relationship
    public function reportone()
    {
        return $this->hasOne(ReportOne::class);
    }
    public function reporttwo()
    {
        return $this->hasOne(ReportTwo::class);
    }
    public function reportthree()
    {
        return $this->hasOne(ReportThree::class);
    }

    //it belongs to
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
