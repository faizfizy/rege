<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function index() {
        //echo "<pre>";print_r($this->session->username);die;

        $this->load->library('table');

        $this->load->model('item_model');
        $items = $this->item_model->get();

        $item_list = array();
        foreach ($items as $id => $item) {
            $item_list[] = array(
                $item->brand . " " . $item->name . " (" . $item->qty . " " . $item->unit . ")",
                anchor('items/view/' . $item->id, 'View Prices')
            );
        }

        $this->load->view('items', array(
            'item_list' => $item_list
        ));
    }

    public function add() {

        include '_checksession.php';

        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->model('shop_model');
        $shops = $this->shop_model->get();

        $shop_dropdown = array();
        foreach ($shops as $id => $shop) {
            $shop_dropdown[$id] = $shop->name;
        }

        $this->form_validation->set_rules(array(
            array(
                'field' => 'brand',
                'label' => 'Brand',
                'rules' => ''
            ),
            array(
                'field' => 'name',
                'label' => 'Item Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'qty',
                'label' => 'Quantity',
                'rules' => 'required|integer'
            ),
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">'
                . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');

        $unit = [
            'pack' => 'pack',
            'piece' => 'piece',
            'L' => 'L',
            'mL' => 'mL',
            'g' => 'g',
            'kg' => 'kg',
            'mg' => 'mg',
            'lb' => 'lb',
            'oz' => 'oz',
        ];

        if (!$this->form_validation->run()) {
            $this->load->view('item_form', array(
                'shop_dropdown' => $shop_dropdown,
                'unit' => $unit,
            ));
        } else {
            $this->load->model(array('item_model', 'price_model'));

            $item = new Item_model();
            $item->brand = $this->input->post('brand');
            $item->name = $this->input->post('name');
            $item->qty = $this->input->post('qty');
            $item->unit = $this->input->post('unit');
            $item->save();

            $price = new Price_model();
            $price->user_id = $this->session->user_id;
            $price->item_id = $this->db->insert_id(); // Can't brain the logic %$#@!
            $price->shop_id = $this->input->post('shop'); //Same
            $price->price = $this->input->post('price');
            $price->datetime = date('Y-m-d H:i:s');
            $price->save();

            $this->load->view('item_form_success', array(
                'item' => $item,
            ));
        }
    }

    public function view($id) {

        $this->load->library('table');
        $this->load->helper('html');

        $this->load->model(array('price_model', 'item_model'));
        $lists = $this->price_model->single_item($id); //custom SQL

        $item_exist = $this->item_model->get_item_id($id);
        if ($item_exist < 1) {
            show_404();
            die;
        }

        $item = new Item_model();
        $item->load($id);

        $RM = "RM ";
        
        $price_list = array();
        foreach ($lists as $p_id => $price) {
            if ($price->item_id == $id) {

                $price_list[] = array(
                    $price->name,
                    $RM . $price->price,
                    date_format(new DateTime($price->datetime),'d/m/Y, h:i A'),
                    $price->username,
                    anchor('items/update/' . $price->id, 'Change Price') . " | " .
                    anchor('items/history/' . $item->id . '/' . $price->shop_id, 'View History')
                );
            }
        }

        $this->load->view('item', array(
            'item' => $item,
            'price_list' => $price_list
        ));
    }

    public function delete($p_id) {

        include '_checksession.php';

        $this->load->model(array('price_model', 'item_model'));
        $price = new Price_model();
        $prices = $this->price_model->update_price($p_id);
        $price->load($p_id);
        $price->delete();

        $item = new Item_model();
        $item->load($prices[0]->item_id);

        $this->load->view('item_deleted', array(
            'item' => $item,
            'prices' => $prices
        ));
    }

    public function update($p_id) {

        include '_checksession.php';

        $this->load->helper('form');
        $this->load->model(array('price_model'));

        $price = $this->price_model->update_price($p_id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|numeric'
            ),
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">'
                . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');

        if (!$this->form_validation->run()) {
            $this->load->view('price_update', array(
                'price' => $price,
            ));
        } else {

            $shop_id = $price[0]->shop_id;
            $item_id = $price[0]->item_id;

            $price = new Price_model();
            $price->price = $this->input->post('price');
            $price->datetime = date('Y-m-d H:i:s');
            $price->shop_id = $shop_id;
            $price->user_id = $this->session->user_id;

            $price->item_id = $item_id;
            $price->save();

            $price = $this->price_model->update_price($p_id);

            $this->load->view('price_updated', array(
                'price' => $price,
            ));
        }
    }

    public function add_price($i_id) {

        include '_checksession.php';

        $this->load->helper('form');

        $this->load->model(array('price_model', 'item_model', 'shop_model'));

        $shops = $this->shop_model->get();
        $shop_dropdown = array();
        foreach ($shops as $id => $shop) {
            $shop_dropdown[$id] = $shop->name;
        }

        $item = new Item_model();
        $item->load($i_id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|numeric'
            ),
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">'
                . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');

        if (!$this->form_validation->run()) {
            $this->load->view('price_add', array(
                'item' => $item,
                'shop_dropdown' => $shop_dropdown
            ));
        } else {

            $price = new Price_model();
            $price->user_id = $this->session->user_id;
            $price->item_id = $i_id;
            $price->shop_id = $this->input->post('shop');
            $price->price = $this->input->post('price');
            $price->datetime = date('Y-m-d H:i:s');
            $price->save();

            $shop = new Shop_model();
            $shop->load($price->shop_id);
            //echo "<pre>";$v = $s;print_r($v);echo gettype($v);die;

            $this->load->view('price_added', array(
                'item' => $item,
                'shop' => $shop
            ));
        }
    }

    public function history($i_id, $s_id) {

        $this->load->helper('html');
        $this->load->library('table');

        $this->load->model(array('price_model', 'item_model'));

        $item = new Item_model();
        $item->load($i_id);

        $prices = $this->price_model->get_history($i_id, $s_id);
        if (!($prices)) {
            redirect('items/view/' . $i_id);
            die;
        }
        
        $RM = "RM ";

        $price_list = array();
        foreach ($prices as $p_id => $price) {
            $price_list[] = array(
                date_format(new DateTime($price->datetime),'d/m/Y, h:i A'),
                $RM. $price->price,
                $price->username,
                anchor('items/delete/' . $price->id, 'Delete Price')
            );
        }

        $this->load->view('history', array(
            'item' => $item,
            'price' => $price,
            'price_list' => $price_list
        ));
        
    }

}

?>