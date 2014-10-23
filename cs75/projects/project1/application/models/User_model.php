<?php

class User_model extends CI_Model{
    
    /**
     * constructor instantiate connect to database;
     */
    public function __construct()
    {
        $this -> load -> database();
        $this -> load -> library('session');
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
    /**
     * create method for C in CRUD,
     * once a user registers this method is called and
     * it is executed to read POST data to insert record in database
     * @return true for success insersion false otherwise
     */
    public function create(){
        $hash = password_hash($this -> input -> post('upasswd1'),PASSWORD_BCRYPT);
        $data = array(
            'uname' => $this -> input -> post('uname'),
            'upasswd' => $hash, 
            'ubalance' => 10000
        );    
        return $this -> db -> insert('users', $data);
    }

    public function authenticate(){
        $username = $this -> input -> post('uname');
        $password = $this -> input -> post('upasswd');

        $sql = 'SELECT `upasswd` from `users` WHERE uname= ? ';
        $query = $this -> db -> query($sql, array($username));
        if($query -> num_rows() > 0){
            $passwd = $query -> first_row() -> upasswd;
            if(password_verify($password,$passwd))
                return true;
            else
                return false;
        }else{
            return false;
        }
            
        return false;
    }
}
