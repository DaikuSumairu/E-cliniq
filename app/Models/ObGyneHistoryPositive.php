<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObGyneHistoryPositive extends Model
{
    use HasFactory;

    protected $fillable = [
        'ob_gyne_history_id',
        '1_positive1',
        '2_positive1',
        '3_positive1',
        '4_positive1',
        '5_positive1',
    ];

    //it belongs to
    public function ob_gyne_history()
    {
        return $this->belongsTo(OBGyneHistory::class);
    }
}
