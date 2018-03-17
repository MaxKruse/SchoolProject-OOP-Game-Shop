<?php

class Shop{

    private $ItemTypes;

    private $Items;

    function __construct(){
        $this->ItemTypes = array("Weapon","Helmet","Chest","Pants","Boots");
    }

    function listItems(){
        for($i = 0; $i < count($this->Items); $i++){
            print $this->Items[$i]["Name"] . "\n";
            if($this->Items[$i]["HP"] > 0)
            print $this->Items[$i]["HP"] . "\n";
            if($this->Items[$i]["Mana"] > 0)
            print $this->Items[$i]["Mana"] . "\n";
            if($this->Items[$i]["Attack"] > 0)
            print $this->Items[$i]["Attack"] . "\n";
            if($this->Items[$i]["Defense"] > 0)
            print $this->Items[$i]["Defense"] . "\n";
        }
    }

    function buyItem($item){
        
    }
        
    function sellItem($item){
        
    }

    function generateItems(){
        $this->Items = array(
            //TODO
        );
    }

}

?>