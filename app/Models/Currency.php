<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $table = 'currency';

    protected $fillable = [
        'id', 
        'name',
        'code',
        'symbol',
    ];

    protected $primaryKey = 'id';

    /*
    protected $hidden = [
        'password',
    ];
    */
}
