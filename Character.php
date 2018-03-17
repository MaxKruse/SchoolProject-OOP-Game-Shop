<?php
require_once("Item.php");

class Character{

    private $ItemTypes, $Stats;
    public $gold, $silver, $copper;
    public $Items;
    

    function __construct(){
        $this->gold = rand(5, 10);
        $this->silver = rand(25, 50);
        $this->copper = rand(1, 75);

        $this->newStats();

        $this->ItemTypes = array("Weapon","Helmet","Chest","Pants","Boots");

        $this->newItems();

        $this->debug();
    }

    function debug(){
        var_dump($this->gold);
        var_dump($this->silver);
        var_dump($this->copper);
        var_dump($this->Stats);
        var_dump($this->Items);
    }

    function newStats(){
        $this->Stats = array(
            "HP" => 100,
            "Mana" => 33,
            "Attack" => 10,
            "Defense" => 10
        );
    }

    function newItems(){
        $this->Items = array();
        for ($i=0; $i < count($this->ItemTypes); $i++) { 
            $this->Items[$i] = new Item($this->ItemTypes[$i]);
        }
    }

    public function equipItem($item){
        
    }

    public function buyItem($item){

    }

    public function sellItem($item){

    }
}

?>