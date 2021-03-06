<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
class CIndex{
    /** @var the model that will be used in this controller */
    private $model;
    /** @var the raw xml data that the constructor will use*/
    private $xml;
    /**
     * constructor method.
     * 1) get the model's file
     * 2) instanciate the model
     * 3) initial raw xml data to $this -> xml
     * 4) start the session in case of cart adding
     */
    function __construct(){
        require(MODELS_PATH."Mmenu.php");
        $this-> model = new Mmenu();
        $this->xml = $this-> model -> getXML();
        session_start();
    }
    /**
     * for testing usage to display all of the RAW xml data to view
     */
    function all(){
        $data = $this -> model -> getXML();
        render('index',$data);
    }
   /**
    * @var category string default 'Pizzas' for selecting the category
    * and then queries some to the model for information collection
    */ 
    public function index($category = 'Pizzas'){
        $data['index'] = $category;
        $data['category'] = $this -> model -> getCategories();
        $data['name'] = $this -> model -> getName($category); 
        $data['price'] = $this -> model -> getAllPrice($category);
        render('index',$data);
    }
    public function success(){
        render('success',array());
    }
    /**
     * function to perform add item to chart operation
     * @reference addValidation
     * it will 1) validate user input 2) perform the cart insersion
     */
    public function addCart(){
        $inData = $this -> addValidation($_GET); 
        if(isset($inData['error'])){
            $_SESSION['error'] = $inData['error']; 
            header("location:". URL);
            return;
        }
        if(isset($_SESSION['cart'])){
            foreach($inData as $element){
                if(key_exists($element['name'].$element['size'],$_SESSION['cart'])){
                    $_SESSION['cart'][$element['name'].$element['size']]['quantity'] += $element['quantity'];
                }
                else
                  $_SESSION['cart'][$element['name'].$element['size']] = $element;
            } 
        }
        else{
           $_SESSION['cart'] = array();
            foreach($inData as $element){
                if(key_exists($element['name'].$element['size'],$_SESSION['cart'])){
                    $_SESSION['cart'][$element['name'].$element['size']]['quantity'] += $element['quantity'];
           foreach($inData as $element)
               $_SESSION['cart'][$element['name']]= $element;
                }
                else
                  $_SESSION['cart'][$element['name'].$element['size']] = $element;
            } 
        }
        render('cart',$_SESSION['cart']);
    }
    /**
     * simple method for viewing the shopping cart
     * just see whether the shopping cart is empty or not and display the cart
     */
    public function viewCart(){
        $data =(isset($_SESSION['cart']))? $_SESSION['cart']:array('cart' => 'empty');
        render('cart',$data);
    }
    /**
     * Field validation for valid user input prompt
     * @var inData array for the data passed in
     * @return array the data that has been nicely parsed and processed
     */
    private function addValidation($inData){
        // the size indicator -> if the size radio is not selected -> refuse
        $sizeIndicator = false;
        // if the quantity are all 0 -> refuse
        $quantityIndicator = false;
        // indicates the food's category for further price query
        $data['category'] =  $inData['category'];
        // item array prepared in the return array $data for setting items
        $data['item'] = array();
        // first loop for striping useless $_GET entries and valid whether
        // Necessary fileds are being selected by user
        foreach($inData as $key => $value){
            // for finding size $key , and find which index it is 
            if(preg_match('/s(\d)(.*)/',$value,$match) ){
                $sizeIndicator = true;
                $data['item'][$match[1]]['size'] = $match[2];
            }
            // same as size $key, it fins out which index the item is
            if(preg_match('/q(\d)/',$key,$match) && $value != 0){
                $quantityIndicator = true;
                $data['item'][$match[1]]['quantity'] = $value;
            }
        }
        // if the size or the quantity is not filled in by user, refuse him
        if(!($sizeIndicator && $quantityIndicator))
            return array('error' => 'You have to select at least 1) Size 2) Quantity for the SAME food~');
        // the indicator for seeing whether same food's both size and quantity
        // are correctly input by user
        $matchIndicator = true;
        // second foreach runs a size check on the data['item']'s each elements
        // it will refuse the user if the element is not sized two
        $outData = array();
        foreach($data['item'] as $key => $item){
            if((count($item))!= 1){
                $matchIndicator = false;
            }
            $name = $this -> model -> getName($data['category'])[$key - 1]; 
            $size = $item['size'];
            $quantity = $item['quantity'];
            $price_for_one = $this -> model -> getPrice($data['category'],$name)[$size]; 
            array_push($outData,compact('name','size','quantity','price_for_one'));
        }
        // if wrong filed is inserted by user, refuse him
        if($matchIndicator)
            return array('error' => 'You sure sure you input the correct thing?');
        // outdata that will be finally returned.
        // totally 4 fields are going to be included for each row
        // 1) name 2) size 3) quantity 4) price for one
        //return the data that should be passed to the controller method
        //that actually renders the views
        return $outData;
    }
}
