<?php

class Item_model extends MY_Model {

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

    function get_item_id($id) {
        $sql = "SELECT * FROM item WHERE id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->num_rows();
    }

}

?>
