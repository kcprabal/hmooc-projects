<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this -> load -> helper('url');
        $this -> load -> library('session');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/index
	 *	- or -  
	 * 		http://example.com/index.php/index/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $logged_in = $this -> session -> userdata('logged_in');
        if($logged_in)
            redirect('/dashboard/');
        $this -> load -> view('template/header');
        $this -> load -> view('index');
		$this -> load -> view('template/footer');
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
