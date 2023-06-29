<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
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

    //it belongs to
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}