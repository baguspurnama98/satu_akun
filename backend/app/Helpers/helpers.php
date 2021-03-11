<?php

// https://stackoverflow.com/questions/61882276/how-to-call-app-path-function-in-laravel-lumen

use Illuminate\Support\Carbon;

if (!function_exists('app_path')) {
    /**
     * Get the path to the application folder.
     *
     * @param  string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app('path') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

function formatRupiah($value)
{
    return "Rp " . number_format($value, 0, ",", ".") . ',-';
}

function convertDateTime($dateTime)
{
    Carbon::setLocale('id');
    return Carbon::parse($dateTime)->format('d/M/Y H:i');
}

function getCalculatedPrice($price): float {
    $percentageFee = 0.2; // 20%
    $topFee = 4800;
    $bottomFee = 2000;
    
    switch ($price) {
        case $price >= 80000 && $price < 500000:
            $percentageFee = 0.06;
            $topFee = 6500;
            $bottomFee = 4800;
            break;
        case $price >= 500000:
            $percentageFee = 0.013;
            $topFee = 9000;
            $bottomFee = 6500;
            break;
        default:
            # code...
            break;
    }

    if ($percentageFee * $price < $bottomFee) {
        return $price + $bottomFee;
    }
    
    if ($percentageFee * $price > $bottomFee) {
        return $price + $topFee;
    }
    return $price + ($percentageFee * $price);
}