<?php

class Item{
    private $ItemTypes = array("Weapon","Helmet","Chest","Pants","Boots");
    
    private $Stats = array(
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

        $temp = "";

        for($i = 0; $i < count($this->ItemTypes); $i++){
            if($this->ItemTypes[$i] == $type)
                $temp = $type;
        }

        if($temp == "")
            exit("Error on creating Item");

        switch($type){
            case "Weapon":
            $this->Stats["Attack"] = 10;
            $this->Stats["HP"] = 10;
            $this->Stats["Name"] = "Mighty " . $type;
                break;
            case "Helmet":
            $this->Stats["HP"] = 20;
            $this->Stats["Mana"] = 20;
            $this->Stats["Name"] = "Strong " . $type;
                break;
            case "Chest":
            $this->Stats["HP"] = 40;
            $this->Stats["Defense"] = 35;
            $this->Stats["Name"] = "Sturdy " . $type;
                break;
            case "Pants":
            $this->Stats["HP"] = 15;
            $this->Stats["Defense"] = 5;
            $this->Stats["Name"] = "Basic " . $type;
                break;
            case "Boots":
            $this->Stats["HP"] = 10;
            $this->Stats["Defense"] = 5;
            $this->Stats["Name"] = "Swift " . $type;
                break;
        
        }

        $this->BuyValue = $this->getBuyValue();

        $this->SellValue = $this->getSellValue();
    }

    function getBuyValue(){
        $price = 0;

        for($i = 0; $i < count($this->Items); $i++){
            if($this->Items[$i]["HP"] > 0)
                $price += $this->Items[$i]["HP"] * 30;
            if($this->Items[$i]["Mana"] > 0)
            $price += $this->Items[$i]["Mana"] * 30;
            if($this->Items[$i]["Attack"] > 0)
            $price += $this->Items[$i]["AttackHP"] * 30;
            if($this->Items[$i]["Defense"] > 0)
            $price += $this->Items[$i]["Defense"] * 30;
        }
        return $price;
    }

    function getSellValue(){
        $price = 0;
        
        return $price;
    }
}

?>