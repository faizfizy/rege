<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
    
    public function index() {
        $this->load->model('Item');
        $this->Item->name = 'Nama Itema';
        $this->Item->save();
        echo '<tt><pre>' . var_export($this->Item, TRUE) . '</pre></tt>';
        
        //$this->load->model('Shop');
        $this->load->view('items');
    }
}

?>