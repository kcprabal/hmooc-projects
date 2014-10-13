<?php

class Mpizza{
    /**
     * @var this is the container for the xml object
     */
    public $xml;
    
    public function __construct(){
        $this -> xml = simplexml_load_file(MODELS_PATH."data.xml");
    }
    public function getDat(){
        return $this-> xml;
    }
    public function getPizzaName(){
        $data = $this -> 
        return $data;
    }
    public function getPizzaDescription(){

    }
    public function getPizzaSize($size){

    }
}

