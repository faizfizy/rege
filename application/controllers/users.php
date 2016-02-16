<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function register() {

        $this->load->view('bootstrap/header'); //bs
        $this->load->helper('form');

        $this->load->model('User');
        $shops = $this->User->get();

        $this->load->library('form_validation');

        $this->form_validation->set_rules(array(
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'trim|required|alpha|min_length[3]|max_length[30]'
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'trim|required|alpha|min_length[3]|max_length[30]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email ID',
                'rules' => 'trim|required|valid_email|is_unique[user.email]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|matches[cpassword]|md5'
            ),
            array(
                'field' => 'cpassword',
                'label' => 'Confirm Password',
                'rules' => 'trim|required'
            )
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if (!$this->form_validation->run()) {
            $this->load->view('registration_view', array(
                    //'shop_dropdown' => $shop_dropdown
            ));
        } else { //magic happens
            $this->load->model(array('User'));

            $user = new User();

            $user->fname = $this->input->post('fname');
            $user->lname = $this->input->post('lname');
            $user->email = $this->input->post('email');
            $user->pass = $this->input->post('password');

            $user->save();

            $this->load->view('registered_view', array(
                    //'item' => $item
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

}
