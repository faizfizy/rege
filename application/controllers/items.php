<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
    
    public function index() {
        
        //$this->load->model('User');
        //$user = new User();
        //$user->load(1);
        //$data['user'] = $user;
        
        //$this->load->model('Shop');
        //$shop = new Shop();
        //$shop->load(1);
        //$data['shop'] = $shop;
        
        
        $this->load->model('Item');        
        $item = new Item();
        $item->load(1);
        $data['item'] = $item;
        
        //$this->Item->name = 'Nama Itema';
        //$this->Item->save();
        //echo '<tt><pre>' . var_export($this->Item, TRUE) . '</pre></tt>';
        
        //$this->load->model('Price');
        
        //$this->load->model('Shop');
        $this->load->view('items');
        $this->load->view('item', $data);
        
    }
}

?>