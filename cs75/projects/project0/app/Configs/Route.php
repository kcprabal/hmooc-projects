<?php
/** router which routes the URL to the correct destination
 * of the controllers
 * The URL design pattern is 
 * 'http://URL'. $controller.$category .$name . $size
 */

class Route{

    private $category;
    private $controller;
    private $name;
    private $size;

    public function __construct(){
        $this -> splitURL();
        $this -> app();
    }
    public function app(){
       $index = new CIndex();
       if(isset($this -> category))
           $index -> index($this -> category); 
       else
           $index -> index();
    }
    public function splitURL(){
        $this -> controller = isset($_GET[''])? $_GET['controller'] : null ;
        $this -> category = isset($_GET['category'])? $_GET['category'] : null ;
        $this-> name = isset($_GET['name'])? $_GET['name'] : null;
        $this -> size = isset($_GET['size'])? $_GET['size'] : null;
    }
}


