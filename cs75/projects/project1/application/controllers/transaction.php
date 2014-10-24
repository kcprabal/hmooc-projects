<?php

class Transaction extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this -> load -> library('session');
        $this -> load -> helper('url');
        $this -> load -> model('transaction_model');
        $logged_in = $this -> session -> userdata('logged_in');
        if(!$logged_in){
           $this -> session -> sess_destroy();
           redirect('/login/','refresh');
        }
    }

    public function buy($sid, $amount){
        if(intval($amount) && $amount > 0){
            $i = $this -> transaction_model -> buy($sid, $amount);
            if($i)
                redirect('/dashboard/');
            else{
                $this -> session -> set_userdata('error', 'not enough balance');
                redirect('/dashboard/');
            }
        }else{
            $this -> load -> view('buy',array('indicator1'=> $sid,'indicator2' =>$amount));
        }
    }

    public function sell($sid){

    }
    /**
     * query uses GET method for getting data from client side
     * so we do not do any parameters in the query method
     */
    public function query(){
        $this -> load -> view('template/header');
        $data['quote'] = $this -> transaction_model -> query();    
        if($data['quote'][0] != 'N/A')
            $this -> load -> view('dashboard/error');
        else
            $this -> load -> view('dashboard/query', $data);

        $this -> load -> view('template/footer');
    }

}
