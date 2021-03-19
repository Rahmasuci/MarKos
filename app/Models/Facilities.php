<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    protected $table = 'facilities';

    protected $fillable = [
        'facility',
    ];

    public function kriteria(){
        return $this->belongsToMany('App\Models\Criteria', 'facility_criteria', 'facility_id', 'criteria_id');
    }
}
