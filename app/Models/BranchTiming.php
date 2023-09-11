<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchTiming extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'day_id',
        'start_time',
        'end_time',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
