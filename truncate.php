<?php
/**
  * this function simply returns the truncated value depending upon specified decimal points.
  * behaves like the truncate function of mysql, but for PHP! and returns the truncated decimal, float or double, without rounding it off
  */
  

function truncate($original, $decimals = '0')
{
    $multiply = '1' . str_repeat('0',$decimals);
    return floor($original * $multiply) / $multiply;
}

// usage:
echo truncate(100.8878, 3);
// returns: 100.887 (instead of 100.888)
