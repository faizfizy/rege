<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function index() {
        $this->load->helper('url');

        //$this->load->view('bootstrap/header'); //bs test
        $this->load->library('table');

        $this->load->model('Item');
        $items = $this->Item->get();
        $item_list = array();
        foreach ($items as $id => $item) {
            $item_list[] = array(
                $item->brand . " " . $item->name,
                anchor('items/view/' . $item->id, 'View Prices')
            );
        }
        //echo "<pre>";print_r($item_list);die;
        $this->load->view('items', array(
            'item_list' => $item_list
        ));
        //$this->load->view('bootstrap/header'); //bs test
    }

    public function add() {

        $this->load->view('bootstrap/header'); //bs
        $this->load->helper('form');

        $this->load->model('Shop');
        $shops = $this->Shop->get();
        $shop_dropdown = array();
        foreach ($shops as $id => $shop) {
            $shop_dropdown[$id] = $shop->name;
        }

        //echo "<pre>";print_r($shop_dropdown);die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'name',
                'label' => 'Item Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|is_numeric'
            ),
                //array(
                //    'field' => 'datetime',
                //    'label' => 'Price date',
                //    'rules' => 'required|callback_date_validation'
                //)
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if (!$this->form_validation->run()) {
            $this->load->view('item_form', array(
                'shop_dropdown' => $shop_dropdown
            ));
        } else { //magic happens
            $this->load->model(array('Price', 'Item'));

            $price = new Price();
            $item = new Item();

            //table item
            $item->brand = $this->input->post('brand');
            $item->name = $this->input->post('name');
            $item->qty = $this->input->post('qty');
            $item->unit = $this->input->post('unit');

            $item->save();

            //table price
            $price->user_id = 1; // Preset for testing purpose
            $price->item_id = $this->db->insert_id(); // Can't brain the logic %$#@!
            $price->shop_id = $this->input->post('shop');
            ; //Same
            $price->price = $this->input->post('price');
            $price->datetime = date('Y-m-d H:i:s');

            $price->save();

            $this->load->view('item_form_success', array(
                'item' => $item
            ));
        }
        $this->load->view('bootstrap/footer'); //bs
    }

    public function date_validation($input) {
        //$test_date = explode('-', $input);
        //if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
        //    $this->form_validation->set_message('date_validation', 'The %s must be in YYYY-MM-DD format.');
        //   return FALSE;
        //}
        return TRUE;
    }

    public function view($id) {
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('table');

        $this->load->model(array('Price', 'Item', 'Shop', 'User'));

        $item = new Item();
        $item->load($id);

        $shop = new Shop();
        $shops = $this->Shop->get();
        $shop_list = array();
        foreach ($shops as $s_id => $shop) {
            $shop_list[] = array(
                $shop->name,
            );
        }

        $user = new User();
        $users = $this->User->get();
        $user_list = array();
        foreach ($users as $u_id => $user) {
            $user_list[] = array(
                $user->fname,
            );
        }

        $price = new Price();
        $prices = $this->Price->get();

        $price_list = array();
        foreach ($prices as $p_id => $price) {
            if ($price->item_id == $id) {

                $price_list[] = array(
                    $shop_list[($price->shop_id) - 1][0],
                    $price->price,
                    $price->datetime,
                    $user_list[($price->user_id) - 1][0],
                    anchor('items/update/' . $item->id . '/' . $price->id . '/' . $shop_list[($price->shop_id) - 1][0], 'Change Price') . " | " .
                    anchor('items/delete/' . $item->id . '/' . $price->id . '/' . $shop_list[($price->shop_id) - 1][0], 'Delete Price')
                );
            }
        }
        //echo "<pre>";print_r($shop_list[1][0]);die;

        $this->load->view('item', array(
            'item' => $item,
            'price_list' => $price_list
        ));
    }

    public function delete($i_id, $p_id, $s_name) {
        
        $this->load->model(array('Price', 'Item'));
        $price = new Price();
        $price->load($p_id);
        $price->delete();

        $item = new Item();
        $item->load($i_id);
        

        $this->load->view('item_deleted', array(
            'item' => $item,
            's_name' => $s_name
        ));
    }
    
    

}

?>