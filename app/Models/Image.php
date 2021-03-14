<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'path_img',
        'boarding_house_id',
    ];

    public function indekos(){
		return $this->belongsTo('App\Models\Indekos', 'boarding_house_id');
    }
}
