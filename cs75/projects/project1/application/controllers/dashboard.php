<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this -> load -> helper('url');
        $this -> load -> library('session');
        $this -> load -> model('user_model'); 
        $logged_in = $this -> session -> userdata('logged_in');
        if(!$logged_in){
           $this -> session -> sess_destroy();
           redirect('/login/','refresh');
        }
    }

    public function index(){
        $this -> load -> view('template/header');
        $userinfo = $this -> user_model -> get_user($this -> session -> userdata('username')); 
        $data['username'] = $userinfo['uname'];
        $data['balance'] = $userinfo['ubalance'];

        $this -> load -> view('dashboard/index',$data);
        $this -> load -> view('template/footer');
    }
}
