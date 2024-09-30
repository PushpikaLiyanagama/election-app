<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionDivision extends Model
{
    use HasFactory;

    // Allow mass assignment of these fields
    protected $fillable = ['district_id', 'division_name'];

    // Define relationship with District
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
