<?php

namespace App\DAO;
use App\Models\Country;

class CountryDAO
{
    function all()
    {
        return Country::all();
    }
}
