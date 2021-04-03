<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [ 'name' ];
    public function matchs()
    {
        # code...
        return $this->belongsToMany('App\Models\Match');
        //return $this->belongsToMany(Match::class);
    }
}
