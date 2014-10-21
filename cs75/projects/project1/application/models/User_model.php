<?php

class User_model extends CI_Model{
    
    /**
     * constructor instantiate connect to database;
     */
    public function __construct()
    {
        $this -> load -> database();
    }

    /**
     * method for getting the user's information
     * @var $uname string user's username
     * return array the row that contains all information for the
     * specific username
     */
    public function get_user($uname){
        $query = $this -> db -> get_where('users',array('uname' => $uname));
        return $query -> row_array();
    }
}
