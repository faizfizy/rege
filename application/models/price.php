<?php

class Price extends MY_Model {
    
    const DB_TABLE = 'price';
    const DB_TABLE_PK = 'id';
    
    public $id;
    public $price;
    public $date;
    public $time;
    public $shop_id;
    public $user_id;
    public $item_id;
    
}

?>