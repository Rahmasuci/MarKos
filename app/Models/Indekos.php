<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indekos extends Model
{
    use HasFactory;

    protected $table = 'boarding_houses';

    protected $fillable = [
        'name',
        'type',
        'address',
        'owner',
        'description',
    ];

    public function user(){
		  return $this->belongsTo('App\Models\User', 'owner');
    }

    public function kriteria(){
		  return $this->hasMany('App\Models\Criteria', 'boarding_house_id');
    }

    public function gambar(){
		  return $this->hasMany('App\Models\Image', 'boarding_house_id');
    }

    public function userFav(){
        return $this->belongsToMany('App\Models\User', 'favorite', 'user_id', 'boarding_house_id');
    }

    public function result(){
		  return $this->hasMany('App\Models\Result', 'boarding_house_id');
    }
}
