<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{

    protected $table = 'followers';
    
    protected $fillable = [
        'id',
        'follower', 
        'followed',
    ];

    protected $primaryKey = 'id';


    public function follower()
    {
        return $this->belongsTo(User::class, 'follower');
    }

    public function followed()
    {
        return $this->belongsTo(User::class, 'followed');
    }

    /*
    protected $hidden = [
        'password',
    ];
    */
}
