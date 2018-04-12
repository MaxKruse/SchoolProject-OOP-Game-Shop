<?php
require_once("Character.php");
require_once("Shop.php");
require_once("Item.php");

class Item {
    private $ItemTypes = array("Weapon","Helmet","Chest","Pants","Boots");
    public $myType;
    
    public $Stats = array(
        "Name" => "",
        "HP" => 0,
        "Mana" => 0,
        "Attack" => 0,
        "Defense" => 0
    );

    private $SellValue = array(
        "Gold" => 0,
        "Silver" => 0,
        "Copper" => 0
    ), $BuyValue = array(
        "Gold" => 0,
        "Silver" => 0,
        "Copper" => 0
    );

    function __construct($type){

        for($i = 0; $i < count($this->ItemTypes); $i++){
            if($this->ItemTypes[$i] == $type)
                $this->myType = $type;
        }

        if($this->myType == "")
            exit("Error on creating Item");

        switch($type){
            case "Weapon":
            $this->Stats["Attack"] = 10 + rand(5,10);
            $this->Stats["Mana"] = 10 + rand(5,10);
            $this->Stats["Name"] = "Mighty " . $type;
                break;
            case "Helmet":
            $this->Stats["HP"] = 10 + rand(5,10);
            $this->Stats["Mana"] = 10 + rand(5,10);
            $this->Stats["Name"] = "Strong " . $type;
                break;
            case "Chest":
            $this->Stats["Attack"] = 5 + rand(5,10);
            $this->Stats["HP"] = 20 + rand(5,10);
            $this->Stats["Defense"] = 15 + rand(5,10);
            $this->Stats["Name"] = "Sturdy " . $type;
                break;
            case "Pants":
            $this->Stats["HP"] = 15 + rand(5,10);
            $this->Stats["Defense"] = 5 + rand(5,10);
            $this->Stats["Name"] = "Basic " . $type;
                break;
            case "Boots":
            $this->Stats["HP"] = 10 + rand(5,10);
            $this->Stats["Defense"] = 5 + rand(5,10);
            $this->Stats["Name"] = "Swift " . $type;
                break;
        
        }

        $this->BuyValue = $this->getBuyValue();

        $this->SellValue = $this->getSellValue();
    }

    function getBuyValue(){
        $price = 0;

        if($this->Stats["HP"] > 0)
            $price += $this->Stats["HP"] * 300;
        if($this->Stats["Mana"] > 0)
            $price += $this->Stats["Mana"] * 176;
        if($this->Stats["Attack"] > 0)
            $price += $this->Stats["Attack"] * 3457;
        if($this->Stats["Defense"] > 0)
            $price += $this->Stats["Defense"] * 234;
    
        return $price;
    }

    function getSellValue(){
        $price = 0;

        if($this->Stats["HP"] > 0)
            $price += $this->Stats["HP"] * 234;
        if($this->Stats["Mana"] > 0)
            $price += $this->Stats["Mana"] * 235;
        if($this->Stats["Attack"] > 0)
            $price += $this->Stats["Attack"] * 785;
        if($this->Stats["Defense"] > 0)
            $price += $this->Stats["Defense"] * 532;
    
        return $price;
    }
}

?>