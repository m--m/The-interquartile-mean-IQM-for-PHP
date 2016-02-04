<?php
/*
 * The interquartile mean (IQM) for PHP
 * As like https://pear.php.net/package/Math_Stats/docs/latest/Math_Stats/Math_Stats.html#methodinterquartileMean
 * More information https://en.wikipedia.org/wiki/Interquartile_mean
 * The interquartile mean (IQM) (or midmean) is a statistical measure of central tendency based 
 * on the truncated mean of the interquartile range. The IQM is very similar to 
 * the scoring method used in sports that are evaluated by a panel of judges: 
 * discard the lowest and the highest scores; calculate the mean value of the remaining scores.
 */

$prices = array(1, 3, 4, 5, 6, 6, 7, 7, 8, 8, 9, 38);

echo interquartileMeanPrices($prices, 0.3);

function interquartileMeanPrices($prices, $percent = 0.1)
{
    sort($prices);

    /* Truncating by sides on $percentValue. For example 10% = 0.1*/
    
    $percentValue = (int) (count($prices)* $percent);
  
    $prices = array_slice($prices, $percentValue);

    
    $prices = array_slice($prices, -count($prices),-$percentValue+count($prices));

    $res = round(array_sum($prices)/count($prices),2);
    return $res;
}