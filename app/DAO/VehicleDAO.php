<?php

namespace App\DAO;
use App\Models\Vehicle;

class VehicleDAO
{
    function all()
    {
        return Vehicle::all();
    }
}
