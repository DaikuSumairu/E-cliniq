<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['visitone_id', 'name', 'dosage', 'quantity'];

    //it belongs to
    public function visitone()
    {
        return $this->belongsTo(VisitOne::class);
    }
}
