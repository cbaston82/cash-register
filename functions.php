<?php
function change($owed, $paying){
    $drawer = array(10000, 5000, 2000, 1000, 500, 100, 25, 10, 5, 1);
    $change = ($owed - $paying) * 100;
    $result = array();

    foreach ($drawer as $money){
        if ($change >= $money){
            $money_amount = floor($change/$money);
            $result[$money] = $money_amount;
            $change -= $money*$money_amount;
        }
    }
    return $result;
}