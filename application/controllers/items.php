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
        
        $this->load->model('Price');
        $price = new Price();
        $price->load(1);
        $data['price'] = $price;
        
        //$this->load->model('Shop');
        $this->load->view('items');
        $this->load->view('item', $data);
        
    }
    
    public function add() {
        
        $this->load->model('Item');
        $items = $this->Item->get();
      
        $item_form_options = array();
        foreach ($items as $id => $item) {
            $item_form_options[$id] = $item->name;
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'id',
                'label' => 'Item',
                'rules' => 'required'
            ),
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|is_numeric'
            ),
            array(
                'field' => 'price_date',
                'label' => 'Price date',
                'rules' => 'required|callback_date_validation'
            )
        ));
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if (!$this->form_validation->run()) {
            $this->load->view('item_form', array(
                'item_form_options' => $item_form_options
            ));
        }
        else {
            $this->load->view('item_form_success');
        }
    }
    
    public function date_validation($input) {
        $test_date = explode('-', $input);
        if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
            $this->form_validation->set_message('date_validation', 'The %s must be in YYYY-MM-DD format.');
            return FALSE;
        }
        return TRUE;
    }
}

?>