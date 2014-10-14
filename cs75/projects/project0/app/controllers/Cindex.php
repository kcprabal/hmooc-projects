<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
class CIndex{

    private $model;
    private $xml;
    function __construct(){
        require(MODELS_PATH."Mmenu.php");
        $this-> model = new Mmenu();
        $this->xml = $this-> model -> getXML();
    }

    function getCatName(){
        $category = $this -> xml->category->item; 
        $data = $category;
        render('index',$data);
    }
}

$index = new CIndex();
$index->getCatName();
