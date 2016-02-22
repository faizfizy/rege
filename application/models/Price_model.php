<?php

class Price_model extends MY_Model {

    const DB_TABLE = 'price';
    const DB_TABLE_PK = 'id';

    public $id;
    public $price;
    public $datetime;
    public $shop_id;
    public $user_id;
    public $item_id;

    public function single_item($item_id) {
        $sql = 'SELECT p.*, s.name, s.id AS shop_id, u.username '
                . 'FROM ('
                . '     SELECT max(id) id, shop_id '
                . '     FROM price '
                . '     WHERE item_id = ? '
                . '     GROUP BY shop_id) q '
                . 'INNER JOIN price p ON p.id = q.id '
                . 'INNER JOIN shop s ON p.shop_id = s.id '
                . 'INNER JOIN user u ON p.user_id = u.id ';
        $query = $this->db->query($sql, array($item_id));
        return $query->result();
    }

    public function get_history($item_id, $shop_id) {
        $sql = 'SELECT p.*, s.id AS shop_id, s.name AS shop_name, u.username '
                . 'FROM price p '
                . 'INNER JOIN shop s ON p.shop_id = s.id '
                . 'INNER JOIN user u ON p.user_id = u.id '
                . 'WHERE p.item_id = ? AND s.id = ? ';
        $query = $this->db->query($sql, array($item_id, $shop_id));
        return $query->result();
    }

    public function update_price($price_id) {
        $sql = 'SELECT p.*, i.brand, i.name AS item_name, i.qty, i.unit, s.name AS shop_name, u.username '
                . 'FROM price p '
                . 'INNER JOIN item i ON p.item_id = i.id '
                . 'INNER JOIN shop s ON p.shop_id = s.id '
                . 'INNER JOIN user u ON p.user_id = u.id '
                . 'WHERE p.id = ? ';
        $query = $this->db->query($sql, array($price_id));
        return $query->result();
    }

}

?>