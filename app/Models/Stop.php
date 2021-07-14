<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{

    protected $table = 'stops';

    protected $fillable = [
        'id', 
        'name',
        'location',
        'adventure'
    ];

    protected $primaryKey = 'id';

    public function adventure()
    {
        return $this->belongsTo(Adventure::class, 'adventure'); 
    }

    public function pics()
    {
        return $this->hasMany(Pic::class, 'stop', 'id');
    }
    

}
