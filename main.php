<?php
require_once("Character.php");
require_once("Shop.php");
require_once("Item.php");


$character = new Character();
$shop = new Shop();

menu();

function menu(string ... $args){
    if($args == NULL){
        print "MENU(): INVALID ARGS";
        die;
    }
    foreach($args as $line){
        print $line;
    }
}

?>