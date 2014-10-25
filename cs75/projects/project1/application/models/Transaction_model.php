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
    public function get_transaction($tid){
        $username = $this -> session -> userdata('username');
        
        $this -> db -> select('*');
        $this -> db -> from('owns');
        $this -> db -> join('users','users.uid = owns.uid');
        $this -> db -> where(array('tid' => $tid,'uname'=>$username));
        $query = $this -> db -> get();
        if($query -> num_rows() == 0)
            return FALSE;
        $data;
        $row = $query -> first_row();
        $data['symbol'] = $row -> sid;
        $this -> get_csvinfo($data['symbol']);
        $data['buy_price'] = $row -> last_price;
        $data['amount'] = $row -> amount;
        $data['company'] =$this -> csv[2];
        $data['current_price'] = $this -> csv[3]; 
        $data['tid'] = $row -> tid;
        
        return $data;
    }
    public function sell($tid,$amount){
        $this -> db -> trans_start();
        
        $username = $this -> session -> userdata('username');
        $user = $this -> db -> get_where('users',array('uname' => $username)) -> first_row();
        $uid = $user -> uid;
        $preBalance = $user -> ubalance;
        $transaction = $this -> db -> get_where('owns',array('tid'=>$tid)) -> first_row();
        $sid = $transaction -> sid;
        $this -> get_csvinfo($sid);
        $cur_price = $this -> csv[3];
        $curBalance = $preBalance + $amount * $cur_price;
        $cur_amount = $transaction -> amount;
        if($cur_amount - $amount < 0){
            $this -> db -> trans_complete();
            return FALSE;
        }else if($cur_amount - $amount == 0){
            $this -> db -> where('tid',$tid);
            $this -> db -> delete ('owns');
        }else{
            $this -> db -> set('amount', 'amount-'.$amount,FALSE);
            $this -> db -> where(array('tid'=> $tid, 'uid' => $uid));
            $this -> db -> update('owns'); 
        }
        $this -> db -> update('users',array('ubalance' => $curBalance));
        $this -> db -> trans_complete();
    }
    /**
     * the query() is going to call get_csvinfo by passing the 
     * $_GET data to it. It will call the service @finance.yahoo
     * to get the informatino. the csv info in stored int the private
     * variable $csv in this class(transaction_model)
     */
    public function query(){
        $quote = $this -> input -> get('quote');
        $this -> get_csvinfo($quote);
        return $this -> csv; 
    }
    /**
     * @var $sid string the symbol of the stock
     * @amount the amount users wants
     * @return if the balance is not enough then scrowl it
     */    
    public function buy($sid, $amount){
        $this -> db -> trans_start();

        $username = $this -> session -> userdata('username');
        $users = $this -> db -> get_where('users',array('uname' => $username)) -> first_row();
        $uid = $users -> uid;
        $preBalance = $users -> ubalance; 
        $this -> get_csvinfo($sid);
        $cur_price = $this -> csv[3]; 
        $curBalance = $preBalance - $amount * $cur_price;
        $query = $this -> db -> get_where('owns',array('sid' => $sid, 'uid' => $uid));
        $last_price = $query -> first_row() -> last_price;
        if($curBalance < 0){
            $this -> db -> trans_complete();
            return false;
        }else{
            $data = array(
                'sid' => $sid,
                'amount' => $amount,
                'uid' => $uid,
                'last_price' => $cur_price
            ); 
            if($last_price != $cur_price){
                $this -> db -> insert('owns',$data);
                $this -> db -> where('uid',$uid);
            }else{
                $this -> db -> set('amount','amount+'.$amount,FALSE);
                $this -> db -> where(array('uid'=> $uid, 'sid' => $sid));
                $this -> db -> update('owns');
            }

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
    /**
     * get_inventory is going to return an array of all the user has to the dashborad
     * @return array which contrains 
     * 1. symbol
     * 2. company name
     * 3. buy price
     * 4. amount
     * 5. current price
     * 6. total price per tid
     * 7. transaction id
     * per row
     */
    public function get_inventory(){
        $username = $this -> session -> userdata('username');
        
        $this -> db -> select('*');
        $this -> db -> from('owns');
        $this -> db -> join('users','users.uid = owns.uid');
        $this -> db -> where(array('uname'=>$username));
        $query = $this -> db -> get();
        if($query -> num_rows() == 0)
            return FALSE;
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

