<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'meds_count',
        'cardiology_count',
        'hypertension_count',
        'bp_monitoring_count',
        'bradycardia_count',
        'hypotension_count',
        'pulmonology_count',
        'urti_count',
        'pneumonia_count',
        'ptb_count',
        'bronchitis_count',
        'lung_pathology_count',
        'acute_bronchitis_count',
        'gastroenterology_count',
        'acute_gastroenteritis_count',
        'gerd_count',
        'hemorrhoids_count',
        'anorexia_count',
    ];

    //it belongs to
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
