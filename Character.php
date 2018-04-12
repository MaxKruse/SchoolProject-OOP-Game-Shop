<?php
require_once("Character.php");
require_once("Shop.php");
require_once("Item.php");
require_once("statics.php");

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
        for ($i=0; $i < (count($this->ItemTypes) + rand(4,8)); $i++) { 
            $this->Items[$i] = new Item($this->ItemTypes[$i % count ($this->ItemTypes)]);
        }

        for ($i=0; $i < 5; $i++) { 
            $this->equipItem($i);
        }

        $this->recalcStats();
    }

    public function equipItem($index){
        $a = $this->Items[$index]->myType;

        $this->Equipped[$a] = $this->Items[$index];
    }

    private function recalcStats(){

        $this->Stats["HP"] = 100 + $this->statsFromItems("HP");
        $this->Stats["Mana"] = 33 + $this->statsFromItems("Mana");
        $this->Stats["Attack"] = 10 + $this->statsFromItems("Attack");
        $this->Stats["Defense"] = 10 + $this->statsFromItems("Defense");

    }

    public function listItems(){

        print "\n\n\n\n\n\n\t\tAvailable items\n\n\n\n\n\n\n\n";

        for($i = 0; $i < count($this->Items); $i++){
            $eq = "";
            foreach($this->Equipped as $check){
                if ($check == $this->Items[$i]){
                    $eq = "EQUIPPED: ";
                }
            }

            $dis = $i + 1; 
            print $eq;
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

            $pureVal = $this->Items[$i]->getSellValue();
            $realVal = convertCurrencyToGSC($pureVal);
            print "Value: " . $realVal["Gold"] . " Gold, " . $realVal["Silver"] . " Silver, " . $realVal["Copper"] . " Copper.\n";

            print "\n";
        }
    }

    public function showStats($detail = false){
        if($detail == false){
            $HP = "";
            $Mana = "";
            $Attack = "";
            $Defense = "";
        }
        else {
            $HP = "(+" . $this->statsFromItems("HP") . " from Items)";
            $Mana = "(+" . $this->statsFromItems("Mana") . " from Items)";
            $Attack = "(+" . $this->statsFromItems("Attack") . " from Items)";
            $Defense = "(+" . $this->statsFromItems("Defense") . " from Items)";
        }

        print "\n\n\n\n\n\n\n\n\n\n\n\n\n\n";

        print $this->Stats["HP"] . " HP " . $HP . "\n";
        print $this->Stats["Mana"] . " Mana " . $Mana . "\n";
        print $this->Stats["Attack"] . " Attack " . $Attack . "\n";
        print $this->Stats["Defense"] . " Defense " . $Defense . "\n";

        print "\n";

        fgets(STDIN);

    }

    private function statsFromItems($stat){
        $res = 0;

        foreach($this->Equipped as $item){
            $res += $item->Stats[$stat];
        }

        return $res;
    }

    public function equipWithHighestStat($stat){

        if($stat != "HP" || $stat != "Mana" || $stat != "Attack" || $stat != "Defense")
            return;

        $max = 0;
        $itemToEquip = NULL;

        foreach($this->Equipped as $item){
            $res = $item->Stats[$stat];

            if($res > $max){
                $max = $res;
                $itemToEquip = array_search($item, $this->Items);
            }
        }

        $this->equipItem($itemToEquip);
    } 
    
}

?>