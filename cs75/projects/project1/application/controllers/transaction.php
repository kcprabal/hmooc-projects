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
    /**
     * this is the method that triggers the buy transaction
     * it will call the buy method in transaction_model
     * and the transacation model handles the real logic
     * if the balance is not enough it will return false so that
     * the controller knows where to redirect the user
     * @var $sid symbol of the strock that users wants to buy
     * @var $amount integer the amount the users acquires
     */
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

    public function sell($tid,$amount){
        if(intval($amount) && $amount > 0){
            $i = $this -> transaction_model -> sell($tid, $amount);
            if($i!==FALSE){
                redirect('/dashboard/');
            }else{
                $this -> session -> set_userdata('error','invalid amount input');
                redirect('/dashboard/');
            }
        }
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
   public function sell_query($tid){
       $this -> load -> view('template/header');
       $tmp = $this -> transaction_model -> get_transaction($tid);
       if($tmp === FALSE)
           $data['error'] = 'You have no such record to sell!';
       else
           $data['transaction']= $tmp;
       $this -> load -> view('dashboard/sell',$data);
       $this -> load -> view('template/footer');  
   }
}
