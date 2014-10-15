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

    function all(){
        $data = $this -> model -> getXML();
        render('index',$data);
    }
    
    public function index($category = 'Pizzas'){
        $data['index'] = $category;
        $data['category'] = $this -> model -> getCategories();
        $data['name'] = $this -> model -> getName($category); 
        $data['price'] = $this -> model -> getAllPrice($category);
        render('index',$data);
