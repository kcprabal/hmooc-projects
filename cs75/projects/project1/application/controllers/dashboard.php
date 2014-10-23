<?php

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this -> load -> helper('url');
        $this -> load -> library('session');
    }

    public function index(){
        $this -> load -> view('template/header');
        $this -> load -> view('dashboard/index');
        $this -> load -> view('template/footer');
    }
}
