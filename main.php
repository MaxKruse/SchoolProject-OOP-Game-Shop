<?php
require_once("Character.php");
require_once("Shop.php");
require_once("Item.php");

$AREA_INVENTORY = 1;
$AREA_SHOP      = 2;
$AREA_STATS     = 3;

$AREA_CURRENT = 1;



$character = new Character();
$shop = new Shop();


while(true){

    $input = menu("","");
    handleInput($input);    
}

function menu(string $main, string ... $args){
    if($args == NULL){
        print "MENU(): INVALID ARGS";
        die;
    }
    $i = 1;
    foreach($args as $line){
        print "[$i] " . $line . "\n";
    }
    print "\n";
    print "Which option do you take?\n";
    print "Input: ";
    $in = trim(fgets(STDIN));
    if($in > $i || $in < 0)
        return "ERROR";
    return $in;
}

function handleInput($var){
    global $AREA_CURRENT, $AREA_INVENTORY, $AREA_SHOP, $AREA_STATS;

    if($var == "ERROR"){
        exit("An error occured. Shutdown...");
    }

    switch($AREA_CURRENT){
        //Options for Inventory
        case $AREA_INVENTORY:
            switch($var){
            default: 
                print "Nothing is happening.\n";
                break;
            case 1:
                $character->listItems();
                break;
            case 2:
                print "Index: ";
                $n = trim(fgets(STDIN));
                $character->equipItem($character->Items[$n]);
                break;
            case 3:
                break;
                $AREA_CURRENT = $AREA_SHOP;
            case 4:
                $AREA_CURRENT = $AREA_STATS;
                break;
            break;
        }

        //Options for Shop
        case $AREA_SHOP:
            switch($var){
            default: 
                print "Nothing is happening.\n";
                break;
            case 6:
                break;
                $AREA_CURRENT = $AREA_SHOP;
            case 7:
                $AREA_CURRENT = $AREA_STATS;
                break;
            break;
        }

        //Options for Stats
        case $AREA_STATS:
            switch($var){
            default: 
                print "Nothing is happening.\n";
                break;

            case 6:
                break;
                $AREA_CURRENT = $AREA_SHOP;
            case 7:
                $AREA_CURRENT = $AREA_STATS;
                break;
            break;
        }
    }
}

?>