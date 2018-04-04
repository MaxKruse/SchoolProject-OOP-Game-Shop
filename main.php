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

//Main Loop
while(true){

    if($AREA_CURRENT == $AREA_INVENTORY){
        $input = menu("Currently in \$INVENTORY\$","List all items","Equip an item", "Equip the best item with a specific stat" , "Go to Shop","Go to Stats","Exit");
    }
    else if($AREA_CURRENT == $AREA_SHOP){
        $input = menu("Currently in \$SHOP\$","");
    }
    else if($AREA_CURRENT == $AREA_STATS){
        $input = menu("Currently in \$STATS\$","Show Stats", "Show detailed Stats", "Go To Inventory", "Go to Shop");
    }
    
    handleInput($input);    
}



//Menu Function
function menu(string $main, string ... $args){
    if($args == NULL){
        print "MENU(): INVALID ARGS";
        die;
    }
    print "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
    print $main . "\n\n\n";

    $i = 1;
    foreach($args as $line){
        print "[$i] $line\n";
        $i++;
    }
    print "\n";
    print "Which option do you take?\n";
    print "Input: ";
    $in = trim(fgets(STDIN));
    if($in > $i || $in < 0)
        return "ERROR";
    return $in;
}


// input-Handler
function handleInput($var){
    global $AREA_CURRENT, $AREA_INVENTORY, $AREA_SHOP, $AREA_STATS;
    global $character, $shop;

    if($var == "ERROR"){
        exit("An error occured. Shutdown...");
    }

    if($AREA_CURRENT == $AREA_INVENTORY){
        switch($var){
        
        case 1:
            $character->listItems();
            fgets(STDIN);
            break;

        case 2:
            $character->listItems();
            print "Index: ";
            $n = trim(fgets(STDIN));
            $character->equipItem($n-1);
            break;

        case 3:
            print "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
            print "What stat do you want? [HP, Mana, Attack, Defense]\n\n";
            print "Index: ";
            $n = trim(fgets(STDIN));

            $character->equipWithHighestStat(strtolower($n));
            break;

        case 4:
            $AREA_CURRENT = $AREA_SHOP;
            break;

        case 5:
            $AREA_CURRENT = $AREA_STATS;
            break;

        case 6:
            exit("Exited in \$INVENTORY\$");
    
        default: 
            print "Nothing is happening.\n";
            break;
        }
    }

    //Options for Shop
    else if($AREA_CURRENT == $AREA_SHOP){
        switch($var){
        default: 
            print "Nothing is happening.\n";
            break;

        case 6:
            $AREA_CURRENT = $AREA_INVENTORY;
            break;

        case 7:
            $AREA_CURRENT = $AREA_STATS;
            break;
        }
    }
        

    //Options for Stats
    else if($AREA_CURRENT == $AREA_STATS){
        switch($var){
        default: 
            print "Nothing is happening.\n";
            break;

        case 1:
            $character->showStats();
            break;

        case 2:
            $character->showStats(true);
            break;

        case 3:
            $AREA_CURRENT = $AREA_INVENTORY;
            break;

        case 74:
            $AREA_CURRENT = $AREA_SHOP;
            break;
        }
    }
}

?>