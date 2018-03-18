<?php
require_once("Character.php");
require_once("Shop.php");
require_once("Item.php");


$character = new Character();
$shop = new Shop();

$shop->listItems();

?>