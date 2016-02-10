<?php

class User extends MY_Model {
    
    const DB_TABLE = 'user';
    const DB_TABLE_PK = 'id';
    
    public $id;
    public $email;
    public $pass;
    public $fname;
    public $lname;
    public $img;
    
}

?>