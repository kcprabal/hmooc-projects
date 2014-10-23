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
            'ubalance' => 100000
        );    
        return $this -> db -> insert('users', $data);
    }

    public function read(){
        if($this -> db -> simple_query($this -> input -> post('uname'))){
            $sql = 'SELECT `upasswd` from `users` WHERE uname=?';
            $hash = password_hash($this -> input -> post('upasswd'),PASSWORD_BCRYPT);
            $result = $this -> db -> query($sql, array($this -> input -> post('uname')));
            $passwd = $result -> row(0,'upasswd');
            $this -> session -> set_userdata('test',$passwd);
            if(password_verify($passwd,$hash))
                return true;
            else
                return false;
        }else{
            return false;
        }
            
        return false;
    }
}
