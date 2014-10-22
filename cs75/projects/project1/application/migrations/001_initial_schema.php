<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Initial_Schema extends CI_Migration{

    private function users_up(){
        $success = $this -> dbforge -> add_field(array(
            'uid' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'uname' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
            ),
            'upasswd' => array(
                'type' => 'CHAR',
                'constraint' => 32,
            ),
            'ubalance' => array(
                'type' => 'REAL',
            )));
        $this -> dbforge -> add_key('uid',TRUE);
        $this -> dbforge -> add_key('uname');

       return( $this -> dbforge -> create_table('users',TRUE));
    }

    private function owns_up(){
        $this -> dbforge -> add_field(array(
            'uid' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'sid' => array(
                'type' => 'VARCHAR',
                'constraint' => 5,
            ),
            'amount' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'last_price' => array(
                'type' => 'DOUBLE',
            )));


        $this -> dbforge -> add_key('uid',true);
        $this -> dbforge -> add_key('sid',true);
        
        $success = $this -> dbforge -> create_table('owns',true);
        
        $this -> dbforge -> add_field('ALTER TABLE `owns` ADD CONSTRAINT `owns_stock` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;');

        return $success;
    }


    private function users_down(){
       return $this -> dbforge -> drop_table('users');
    } 

    private function owns_down(){
        return $this -> dbforge -> drop_table('owns');
    }

    public function up(){
        if($this -> users_up())
            echo 'users table created <br/>';
        if($this -> owns_up())
            echo 'owns table created <br/>';
    }

    public function down(){
        if($this -> owns_down())
            echo 'users table dropped <br/>';
        if($this -> users_down())
            echo 'owns table dropped <br/>';
    }
} 
