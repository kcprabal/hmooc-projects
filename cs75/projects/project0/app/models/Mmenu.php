<?php

class Mmenu{
    /**
     * @var this is the container for the xml object
     */
    private $xml;
    /**
     * constructor function for reading the xml file
     * and put it in to the xml object for further operatoins
     */ 
    public function __construct(){
        $this -> xml = simplexml_load_file(MODELS_PATH."data.xml");
    }
    /**
     * returns the whole xml object
     */
    public function getXML(){
        return $this-> xml;
    }
    public function getCategories(){
        $tmp = $this -> xml 
    }
}

