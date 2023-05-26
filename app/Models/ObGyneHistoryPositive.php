<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObGyneHistoryPositive extends Model
{
    use HasFactory;

    protected $fillable = [
        'ob_gyne_history_id',
        'review_of_system_id',
        '1_positive1',
        '2_positive1',
        '3_positive1',
        '4_positive1',
        '5_positive1',
        '1_positive2',
        '2_positive2',
        '3_positive2',
        '4_positive2',
        '5_positive2',
        '6_positive2',
        '7_positive2',
        '8_positive2',
        '9_positive2',
        '10_positive2',
    ];

    //it belongs to
    public function ob_gyne_history()
    {
        return $this->belongsTo(OBGyneHistory::class);
    }
    public function review_of_system()
    {
        return $this->belongsTo(ReviewOfSystem::class);
    }
}
