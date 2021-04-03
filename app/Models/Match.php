<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    protected $fillable = [ 'team1_id', 'team2_id', 'score_club1', 'score_clubn' ];
    public function teams()
    {
        # code...
        return $this->belongsToMany('App\Models\Team');
        //return $this->belongsToMany(Team::class);
    }
}
