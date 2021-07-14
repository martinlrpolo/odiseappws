<?php

namespace App\DAO;
use App\Models\Currency;

class CurrencyDAO
{
    function all()
    {
        return Currency::all();
    }
}
