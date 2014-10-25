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
        $this -> load -> library('session');
    }
    /**
     * @var string $sid the ticker of the stock
     * this mainly gets the specific tickes' csv file and translate it
     */
    public function get_csvinfo($sid){
        $csv_url = $this -> _make_csv_url($sid);
        $file = fopen($csv_url, 'r');
        $this -> csv = fgetcsv($file);
        fclose($file);
    }
    /**
     * @uname string the user_name of the user
     * @sid string the stock ticker name of the stock
     */
    public function get_transaction($uname, $sid){
        
    }
    public function query(){
        $quote = $this -> input -> get('quote');
        $this -> get_csvinfo($quote);
        return $this -> csv; 
    }
        
    public function buy($sid, $amount){
        $this -> db -> trans_start();

        $username = $this -> session -> userdata('username');
        $users = $this -> db -> get_where('users',array('uname' => $username)) -> first_row();
        $uid = $users -> uid;
        $preBalance = $users -> ubalance; 
        $this -> get_csvinfo($sid);
        $last_price = $this -> csv[3]; 
        $curBalance = $preBalance - $amount * $last_price;
        if($curBalance < 0){
            $this -> db -> trans_complete();
            return false;
        }else{
            $data = array(
                'sid' => $sid,
                'amount' => $amount,
                'uid' => $uid,
                'last_price' => $last_price
            ); 
            $this -> db -> insert('owns',$data);
            $this -> db -> where('uid',$uid);
            $this -> db -> update('users',array('ubalance' => $curBalance));

            $this -> db -> trans_complete();
        }
        return true;
    }
    /**
     * this is a self helper function that will allow the 
     * get_csv_info function quickly gets the csv info
     */
    private function _make_csv_url($sid){
        return 'http://download.finance.yahoo.com/d/quotes.csv?s='.$sid.'&f=e1snl1&e=.csv';
   }
    public function get_inventory(){
        $username = $this -> session -> userdata('username');
        
        $this -> db -> select('*');
        $this -> db -> from('owns');
        $this -> db -> join('users','users.uid = owns.uid');
        $this -> db -> where(array('uname'=>$username));
        $query = $this -> db -> get();
        $i = 0;
        $data;
        foreach($query -> result() as $row){
            $data[$i]['symbol'] = $row -> sid;
            $this -> get_csvinfo($data[$i]['symbol']);
            $data[$i]['buy_price'] = $row -> last_price;
            $data[$i]['amount'] = $row -> amount;
            $data[$i]['company'] =$this -> csv[2];
            $data[$i]['current_price'] = $this -> csv[3]; 
            $data[$i]['total'] = $data[$i]['amount'] * $data[$i]['current_price'];
            $data[$i]['tid'] = $row -> tid;
            $i++;
        }
        return $data;
    }
}

