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

    function categories(){
        $data = $this -> model -> getCategories();
        render('index',$data);
    }
    function name($category){
        $data = $this -> model -> getName($category);
        render('index',$data);
    } 
    function size($category,$name){
        $data = $this -> model -> getPrice($category, $name);
        render('index',$data);
    }
}

$index = new CIndex();
$index -> size('Salads','Greek');
