<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_school_id',
        'day',
        'role',
    ];

    //has relationship
    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function visitone()
    {
        return $this->hasOne(VisitOne::class);
    }
    public function visittwo()
    {
        return $this->hasOne(VisitTwo::class);
    }
    public function visitthree()
    {
        return $this->hasOne(VisitThree::class);
    }

    //it belongs to
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
