<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHistoryPositive extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_history_id',
        '1_positive',
        '2_positive',
        '3_positive',
        '4_positive',
        '5_positive',
        '6_positive',
        '7_positive',
        '8_positive',
        '9_positive',
        '10_positive',
        '11_positive',
        '12_positive',
    ];

    public function family_history()
    {
        return $this->belongsTo(FamilyHistory::class);
    }
}
