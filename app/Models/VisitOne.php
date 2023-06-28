<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meds',
        'cardiology',
        'hypertension',
        'bp_monitoring',
        'bradycardia',
        'hypotension',
        'pulmonology',
        'urti',
        'pneumonia',
        'ptb',
        'bronchitis',
        'lung_pathology',
        'acute_bronchitis',
        'gastroenterology',
        'acute_gastroenteritis',
        'gerd',
        'hemorrhoids',
        'anorexia',
    ];

    //has relationship
    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
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
