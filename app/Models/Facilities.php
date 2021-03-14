<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    protected $table = 'facilities';

    protected $fillable = [
        'facilities',
        'criteria_id',
    ];

    public $timestamps = false;

    public function kriteria(){
        return $this->belongsToMany('App\Models\Criteria', 'facility_criteria', 'facility_id', 'criteria_id');
    }
}
