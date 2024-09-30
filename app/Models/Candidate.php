<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Candidate extends Model
// {
//     use HasFactory;

//     // Allow mass assignment of these fields
//     protected $fillable = ['year', 'team', 'candidate_name'];
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name']; // Assuming the candidate's name is stored in a `name` column

    public function electionResults()
    {
        return $this->hasMany(ElectionResult::class);
    }
}
