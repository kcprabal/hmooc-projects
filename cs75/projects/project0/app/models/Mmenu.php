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
        $i = 0;
        foreach ($nodes as $node){
            $data[$i] =(string) $node -> attributes()['name']; 
            $i ++;
        }      
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
        $i = 0;
        foreach($nodes as $node){
            $data[$i] =(string) $node -> attributes()['name'];
            $i ++;
        }
       return $data; 
    }
    /**
     * get the price of the different size of food
     * @param $category string the category of the food
     * @param $name string the name of the food
     * return array 2 dimension array, each row is [<size>][price]
     */
    public function getPrice($category,$name){
        $data = null;
        $size = $this -> xml -> xpath('/menu/category[@name="'.$category.'"]/item[@name="'.$name.'"]/price');
        $data = $size;
        return $data;
    }
}

