<?php
require_once("Character.php");
require_once("Shop.php");
require_once("Item.php");

class Character {

    private $ItemTypes, $Stats;
    public $Currency = array();
    public $Items;
    private $Equipped;
    

    function __construct(){
        $this->Currency["Gold"] = rand(5, 10);
        $this->Currency["Silver"] = rand(25, 50);
        $this->Currency["Copper"] = rand(1, 75);

        $this->newStats();

        $this->Equipped = array(
            "Weapon" => NULL, 
            "Helmet" => NULL, 
            "Chest" => NULL, 
            "Pants" => NULL, 
            "Boots" => NULL
        );

        $this->ItemTypes = array("Weapon","Helmet","Chest","Pants","Boots");

        $this->newItems();

        //$this->debug();
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

    public function equipItem(Item $item){
        $this->Equipped[$item->myType] = $item;
    }

    public function listItems(){

        print "\n\n\n\n\n\n\t\tAvailable items\n\n\n\n\n\n\n\n";

        for($i = 0; $i < count($this->Items); $i++){
            $dis = $i + 1; 
            print "No " . $dis . ": ";
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
    
}

?>