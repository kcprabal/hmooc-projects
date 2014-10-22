<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this -> load -> helper('url');
    }
    /**
     * The method that displays the default log in views
     * prompt for user input
     */
    public function index(){
        $this -> load -> view('template/header');
        $this -> load -> view('login/login');
        $this -> load -> view('template/footer');
    }
    /**
     * The method that displays the default register views
     * for user to input his/her infomation
     */
    public function register(){
        $this -> load -> view('template/header');
        $this -> load -> view('login/register');
        $this -> load -> view('template/footer');
    }

}

