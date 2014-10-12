<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
class CIndex{

    private $model;
    function __construct(){
        require("../models/Mpizza.php");
        $this -> model = new Mpizza();
        $this -> model -> printData();
    }

}

$index = new CIndex();
