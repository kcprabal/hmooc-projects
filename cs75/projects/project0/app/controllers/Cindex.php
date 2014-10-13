<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
class CIndex{

    private $model;
    private $xml;
    function __construct(){
        require(MODELS_PATH."Mpizza.php");
        $this-> model = new Mpizza();
        $this-> xml = $this-> model -> loadData();
    }
    function printData(){
        print_r($this->xml);
    }
}

$index = new CIndex();
$index->printData();
