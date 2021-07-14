<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{

	protected $table = 'adventures';

    protected $fillable = [
        'name',
        'duration',
        'temperature',
        'security',
        'budget',
        'precautions',
        'recommendations',
        'luggage',
        'vehicle',
        'price',
        'currency',
        'user',
        'status'
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle');
    }

    public function stops()
    {
        return $this->hasMany(Stop::class, 'adventure', 'id');
    }

}
