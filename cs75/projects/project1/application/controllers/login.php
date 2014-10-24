<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this -> load -> model('user_model');
        $this -> load -> helper('url');
        $this -> load -> library('session');
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

    public function register_action(){
        $this -> load -> view('template/header');

        $this -> load -> library('form_validation');
        $this -> load -> helper('form');

        $this -> form_validation -> set_rules('uname','User Name','required|trim|xss_clean|is_unique[users.uname]');
        $this -> form_validation -> set_rules('upasswd1','User Password','required');
        $this -> form_validation -> set_rules('upasswd2','User Password Confirm','required|matches[upasswd1]');

        if($this -> form_validation -> run() == FALSE){
            $data['error'] = validation_errors();
            $this -> load -> view('login/register',$data);
        }
        else{ 
            if($this -> user_model -> create()){
                $this -> session -> set_userdata('logged_in',TRUE);
                $this -> session -> set_userdata('username',$this -> input -> post('uname'));
                redirect('dashboard/');
            }
            else{
                $data['error'] = 'write database error';
                $this -> view('login/register',$data);
            }
        }
        $this -> load -> view('template/footer');
    }

    public function login_action(){
        $this -> load -> view('template/header');

        $this -> load -> helper('form');
        $this -> load -> library ('form_validation');
        
        $this -> form_validation -> set_rules('uname','User Name','required');
        $this -> form_validation -> set_rules('upasswd','User Password','required');

        if($this -> form_validation -> run() == FALSE){
            $data['error'] = validation_errors();
            $this -> load -> view ('login/login',$data);
        }else{
            if($this -> user_model -> authenticate()){
                $this -> session -> set_userdata('logged_in',TRUE);
                $this -> session -> set_userdata('username',$this -> input -> post('uname'));
                redirect('/dashboard/');
            }else{
               $data['error'] = 'Sorry, wrong login info';
               $this -> load -> view ('login/login',$data);
            }
        }
        $this -> load -> view('template/footer');
    }

    public function logout(){
        $this -> session -> sess_destroy();
        redirect('/');
    }
}

