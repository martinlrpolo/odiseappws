<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';

    protected $fillable = [
        'id', 
        'code',
        'name'
    ];

    protected $primaryKey = 'id';

    /*
    protected $hidden = [
        'password',
    ];
    */
}
