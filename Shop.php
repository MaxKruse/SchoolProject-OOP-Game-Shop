<?php
require_once("Character.php");
require_once("Shop.php");
require_once("Item.php");

class Shop {

    private $ItemTypes = array("Weapon","Helmet","Chest","Pants","Boots");

    private $Items = array();

    function __construct(){
        $this->generateItems();
    }

    function listItems(){

        print "\n\n\t\tAvailable items\n\n";

        for($i = 0; $i < count($this->Items); $i++){
            $dis = $i + 1; 
            print "Nr " . $dis . ": ";
            print $this->Items[$i]->Stats["Name"] . "\n";
            if($this->Items[$i]->Stats["HP"] > 0)
            print "HP: " . $this->Items[$i]->Stats["HP"] . "\n";
            if($this->Items[$i]->Stats["Mana"] > 0)
            print "Mana: " . $this->Items[$i]->Stats["Mana"] . "\n";
            if($this->Items[$i]->Stats["Attack"] > 0)
            print "Attack: " . $this->Items[$i]->Stats["Attack"] . "\n";
            if($this->Items[$i]->Stats["Defense"] > 0)
            print "Defense:" . $this->Items[$i]->Stats["Defense"] . "\n";

            print "\n";
        }
    }

    function buyItem(Item $item, Character $char){
        $playerMoney = convertGSCtoCurrency($char->Currency);

        if($playerMoney > $item->getBuyValue()){
            $playerMoney -= $item->getBuyValue();
            $char->Items = array_merge($char->Items, array($item));
        }
        else {
            print "\nNot enough money to buy this";
        }
        $index = array_search(Item, $this->Items);
        unset($this->Items[$index]);

        $char->Currency = convertGSCtoCurrency($playerMoney);
    }
        
    function sellItem(Item $item, Character $char){
        $playerMoney = convertGSCtoCurrency($char->Currency);

        for($i = 0; $i < count($char->Items); $i++){
            if($char->Items[$i] == $item){
                unset($char->Items[$i]);
                $playerMoney += $item->getSellValue();
            }
        }


        $char->Currency = convertGSCtoCurrency($playerMoney);        
    }

    static function convertGSCtoCurrency($arr){
        
        $gold = $arr["Gold"];

        $silver = $arr["Silver"];

        $copper = $arr["Copper"];

        $money = $gold * 100 * 100;
        $money += $silver * 100;
        $money += $copper;

        return $money;
    }

    static function convertCurrencyToGSC($money){
        
        $arr = array();

        $Gold = floor($money / 10000);

        $money = $money % 10000;

        $Silver = floor($money / 100);

        $money = $money % 100;

        $Copper = floor($money);

        $arr["Gold"] = $Gold;
        $arr["Silver"] = $Silver;
        $arr["Copper"] = $Copper;

        var_dump($arr);

        return $arr;
    }

    function generateItems($total = 12){

        $amountWeapon = rand(2,$total / 4);
        $amountHelmet = rand(2,$total / 3);
        $amountChest = rand(2,$total / 4);
        $amountPants = rand(2,$total / 4);
        $amountBoots = $total - $amountWeapon -$amountChest - $amountHelmet - $amountPants;
        
        $tempWeapon = array();

        $tempHelmet = array();

        $tempChest = array();

        $tempPants = array();

        $tempBoots = array();

        for($i = 0; $i < $amountWeapon; $i++){
            $tempWeapon[$i] = new Item("Weapon");
        }
        for($i = 0; $i < $amountHelmet; $i++){
            $tempHelmet[$i] = new Item("Helmet");
        }
        for($i = 0; $i < $amountChest; $i++){
            $tempChest[$i] = new Item("Chest");
        }
        for($i = 0; $i < $amountPants; $i++){
            $tempPants[$i] = new Item("Pants");
        }
        for($i = 0; $i < $amountBoots; $i++){
            $tempBoots[$i] = new Item("Boots");
        }

        $this->Items = array_Merge($tempBoots, $tempChest, $tempHelmet, $tempPants, $tempWeapon);
    }

}

?>