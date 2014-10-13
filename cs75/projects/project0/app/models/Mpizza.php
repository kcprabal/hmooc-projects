<?php

class Mpizza{
    /**
     * @var this is the container for the xml object
     */
    private $xml;
    
    public function __construct(){

        $this -> xml = simplexml_load_file('data.xml');
    }

    public function printData(){
        print_r ( $this-> xml );
    }
}

