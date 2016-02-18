<?php

class User_model extends MY_Model {

    const DB_TABLE = 'user';
    const DB_TABLE_PK = 'id';

    public $id;
    public $email;
    public $pass;
    public $fname;
    public $lname;
    public $username;
    public $img;

    public function get_user($email) {
        $sql = 'SELECT * FROM user WHERE email = ? ';
        $query = $this->db->query($sql, array($email));
        return $query->result();
    }

}

?>