<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    // Allow mass assignment of the 'name' field
    protected $fillable = ['name'];

    public function divisions()
    {
        return $this->hasMany(ElectionDivision::class);
    }
}
