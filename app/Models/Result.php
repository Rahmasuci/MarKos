<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = [
        'user_id',
        'boarding_house_id',
        'price_criteria',
        'distance_criteria',
        'large_criteria',
        'facility_criteria',
        'condition_criteria',
        'result',
        'rank',
        'result_code'
    ];

    public function indekos(){
		  return $this->belongsTo('App\Models\Indekos', 'boarding_house_id');
    }

    public function user(){
		  return $this->belongsTo('App\Models\User', 'user_id');
    }
}
