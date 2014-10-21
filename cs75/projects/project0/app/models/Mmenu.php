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
    /**
     * gets the categories' name
     * @returns array $data using index for all the categories
     */
    public function getCategories(){
        $data = null;
        $nodes = $this -> xml -> xpath("//menu/category");
        foreach ($nodes as $key => $node)
            $data[$key] =(string) $node -> attributes()['name'];    
        return $data;
    }
    /**
     * get the product name according to the category
     * @param string the name of the category
     * @return array contains the names in it
     */
    public function getName($category){
        $data = null;
        $nodes = $this -> xml -> xpath('//menu/category[@name="'.$category.'"]/item');
        foreach($nodes as $key => $node)
            $data[$key] =(string) $node -> attributes()['name'];
       return $data; 
    }
    /**
     * get the price of the different size of food
     * @param $category string the category of the food
     * @param $name string the name of the food
     * return array 1 dimension array, each row is [<size>]=>[price]
     */
    public function getPrice($category,$name){
        $data = null;
        $node = $this -> xml -> xpath('/menu/category[@name="'.$category.'"]/item[@name="'.$name.'"]/price');
        $data = get_object_vars($node[0]);
        return $data;
    }
    /**
     * for the purpose of getting all the price information for the foods
     * 1. the size of it.
     * 2. the price of it.
     * @var string the category of the food
     * @return array containing 1. size 2. price
     */ 
    public function getAllPrice($category){
        $data = null;
        $nodes = $this -> xml -> xpath('/menu/category[@name="'.$category.'"]/item');
        foreach ($nodes as $key => $node)
            $data[$key] =get_object_vars( $node -> price);
        return $data;
    }

}

