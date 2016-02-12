<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function index() {
        $this->load->view('bootstrap/header'); //bs test
        $this->load->library('table');

        $this->load->model('Item');
        $items = $this->Item->get();
        $item_list = array();
        foreach ($items as $id => $item) {
            $item_list[] = array(
                $item->name
            );
        }
        //echo "<pre>";print_r($item_list);die;
        $this->load->view('items', array(
            'item_list' => $item_list
        ));
        $this->load->view('bootstrap/header'); //bs test
    }

    public function add() {
        
        $this->load->view('bootstrap/header');
        $this->load->helper('form');

        $this->load->model('Shop');
        $shops = $this->Shop->get();
        $shop_dropdown = array();
        foreach ($shops as $id => $shop) {
            $shop_dropdown[$id] = $shop->name;
        }

        $this->load->model('Item');
        $items = $this->Item->get();

        $item_form_options = array();
        foreach ($items as $id => $item) {
            $item_form_options[$id] = $item->name;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'item',
                'label' => 'Item',
                'rules' => 'required'
            ),
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|is_numeric'
            ),
            array(
                'field' => 'date',
                'label' => 'Price date',
                'rules' => 'required|callback_date_validation'
            )
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if (!$this->form_validation->run()) {
            $this->load->view('item_form', array(
                'item_form_options' => $item_form_options,
                'shop_dropdown' => $shop_dropdown
            ));
        } else {
            $this->load->model('Price');
            $price = new Price();
            $price->user_id = 1; // Preset for testing purpose
            $price->shop_id = 1;
            $price->item_id = 1;
            $price->price = $this->input->post('price');
            $price->date = $this->input->post('date');
            $price->save();
            $this->load->view('item_form_success', array(
                'item' => $item
            ));
        }
        $this->load->view('bootstrap/footer');
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