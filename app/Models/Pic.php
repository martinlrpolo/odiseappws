<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{

    protected $table = 'pics_stops';

    protected $fillable = [
        'id', 
        'file',
        'stop'
    ];
    
    protected $primaryKey = 'id';

    public function stop()
    {
        return $this->belongsTo(Stop::class, 'stop');
    }

}
