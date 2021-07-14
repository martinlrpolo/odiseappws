<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'users';


    protected $fillable = [
        'id',
        'fullname', 
        'email',
        'phone',
        'country',
        'password',
        'pic'
    ];

    protected $primaryKey = 'id';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    /*
    protected $hidden = [
        'password',
    ];
    */
}
