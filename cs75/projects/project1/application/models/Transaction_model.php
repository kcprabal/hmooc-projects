<?php

class Transaction_model extends CI_Model{
    /**
     * @var the csv file to be fetch via Yahoo.com
     */
    private $csv;
    /**
     * constructor that load the database and the csv file
     */
    public function __construct()
    {
        $this -> load -> database();
    }
    /**
     * @var string $sid the ticker of the stock
     * this mainly gets the specific tickes' csv file and translate it
     */
    public function get_csvinfo($sid){
        $csv_url = $this -> make_csv_url($sid);
        $this -> csv = fgetcsv($csv_url);
    }
    /**
     * @uname string the user_name of the user
     * @sid string the stock ticker name of the stock
     */
    public function get_transaction($uname, $sid){

    }
    /**
     * this is a self helper function that will allow the 
     * get_csv_info function quickly gets the csv info
     */
    private function make_csv_url($sid){
        return 'http://download.finace.yahoo.com/d/quotes.csv?s='.$sid.'f=snl1&e=.csv';
   }

}

