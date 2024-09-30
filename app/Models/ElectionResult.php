<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class ElectionResult extends Model
// {
//     use HasFactory;

//     protected $fillable = ['district_id', 'division_id', 'candidate_id', 'year', 'votes'];

//     // Define relationships
//     public function district()
//     {
//         return $this->belongsTo(District::class);
//     }

//     public function division()
//     {
//         return $this->belongsTo(ElectionDivision::class);
//     }

//     public function candidate()
//     {
//         return $this->belongsTo(Candidate::class);
//     }
// }

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class ElectionResult extends Model
// {
//     use HasFactory;

//     protected $fillable = ['district_id', 'division_id', 'year', 'candidate_id', 'candidate_name', 'votes'];

//     // No need for a candidate relationship if candidate_name is a direct field
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectionResult extends Model
{
    protected $fillable = ['district_id', 'division_id', 'candidate_id', 'year', 'votes'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function division()
    {
        return $this->belongsTo(ElectionDivision::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id'); // Replace 'district_id' with your actual foreign key column
    }
}
