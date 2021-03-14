<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';

    protected $fillable = [
        'price',
        'distance',
        'large',
        'boarding_house_id',
    ];

    public function indekos(){
		  return $this->belongsTo('App\Models\Indekos', 'boarding_house_id');
    }

    public function kondisi(){
        return $this->belongsToMany('App\Models\Condition', 'condition_criteria', 'criteria_id', 'condition_id' );
    }

    public function fasilitas(){
        return $this->belongsToMany('App\Models\Facilities', 'facility_criteria', 'criteria_id', 'facility_id');
    }
}
