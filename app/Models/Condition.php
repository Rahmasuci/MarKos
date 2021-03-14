<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $table = 'conditions';

    protected $fillable = [
        'condition',
        'criteria_id',
    ];

    public $timestamps = false;

    public function kriteria(){
        return $this->belongsToMany('App\Models\Criteria', 'condition_criteria', 'condtion_id', 'criteria_id');
    }
}
