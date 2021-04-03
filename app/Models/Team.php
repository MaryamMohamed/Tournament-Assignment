<?php
use Kyslik\ColumnSortable\Sortable;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Team extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [ 'name' ];
    public function matchs()
    {
        # code...
        return $this->belongsToMany('App\Models\Match');
        //return $this->belongsToMany(Match::class);
    }
    
    public $sortable = ['points'];
}
