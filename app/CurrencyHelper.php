<?php

namespace App;

class CurrencyHelper
{
    public static function formatCurrency($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}