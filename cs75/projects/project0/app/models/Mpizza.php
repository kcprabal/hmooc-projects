<?php

class Mpizza{
    /**
     * @var this is the container for the xml object
     */
    public $xml;
    
    public function __construct(){

    }
    public function loadData(){
        $this -> xml = simplexml_load_file(MODELS_PATH."data.xml");
        return $this-> xml;
    }
}

