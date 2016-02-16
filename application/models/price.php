<?php

class Price extends MY_Model {
    
    const DB_TABLE = 'price';
    const DB_TABLE_PK = 'id';
    
    public $id;
    public $price;
    public $datetime;
    public $shop_id;
    public $user_id;
    public $item_id;
    
    public function get_price_details($item_id){
        $sql = 'SELECT a.*,b.name FROM price a INNER JOIN shop b ON a.shop_id=b.id WHERE a.item_id=?';
        $query = $this->db->query($sql,array($item_id));
        return $query->result();
    }
    
}

?>