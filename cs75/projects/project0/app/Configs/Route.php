<?php
/** router which routes the URL to the correct destination
 * of the controllers
 * The URL design pattern is 
 * 'http://URL'. $controller.$category .$name . $size
 */

class Route{

    private $category;
    private $cart;
    private $name;
    private $size;
    private $index;

    public function __construct(){
        $this -> splitURL();
        $this -> app();
    }
    public function app(){
       $this -> index = new CIndex();
       if(isset($this -> cart))
           $this -> index -> addCart();
       else if(isset($this -> category))
           $this -> index -> index($this -> category); 
       else
           $this -> index -> index();
    }
    public function splitURL(){
        $this -> cart = isset($_GET['cart'])? $_GET['cart'] : null ;
        $this -> category = isset($_GET['category'])? $_GET['category'] : null ;
        $this-> name = isset($_GET['name'])? $_GET['name'] : null;
        $this -> size = isset($_GET['size'])? $_GET['size'] : null;
    }
}


