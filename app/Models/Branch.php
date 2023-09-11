<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_id',
        'name',
        'status',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function timings()
    {
        return $this->hasMany(BranchTiming::class);
    }
}
