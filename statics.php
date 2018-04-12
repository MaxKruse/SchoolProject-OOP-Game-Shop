<?php

function convertGSCtoCurrency($arr){
    
    $gold = $arr["Gold"];

    $silver = $arr["Silver"];

    $copper = $arr["Copper"];

    $money = $gold * 100 * 100;
    $money += $silver * 100;
    $money += $copper;

    return $money;
}

function convertCurrencyToGSC($money){
    
    $arr = array();

    $Gold = floor($money / 10000);

    $money = $money % 10000;

    $Silver = floor($money / 100);

    $money = $money % 100;

    $Copper = floor($money);

    $arr["Gold"] = $Gold;
    $arr["Silver"] = $Silver;
    $arr["Copper"] = $Copper;

    return $arr;
}

?>