<?php

class Item extends MY_Model {
    
    const DB_TABLE = 'item';
    const DB_TABLE_PK = 'id';
    
    public $id;
    public $brand;
    public $name;
    public $category;
    public $qty;
    public $qty_bulk;
    public $unit;
    public $img;
    
}

?>
