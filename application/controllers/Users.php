<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function register() {
        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('user_model');
        $shops = $this->user_model->get();

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
            $this->load->model(array('user_model'));

            $user = new User_model();

            $user->fname = $this->input->post('fname');
            $user->lname = $this->input->post('lname');
            $user->username = $this->input->post('username');
            $user->email = $this->input->post('email');
            $user->pass = $this->input->post('password');

            $user->save();

            $this->load->view('registered_view', array(
                    //'item' => $item
            ));
        }
    }

    public function date_validation($input) {
        //$test_date = explode('-', $input);
        //if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
        //    $this->form_validation->set_message('date_validation', 'The %s must be in YYYY-MM-DD format.');
        //   return FALSE;
        //}
        return TRUE;
    }

    public function logout() {

        $this->load->library('session');
        $this->session->sess_destroy();
        header("location:../index.php");
    }

    public function login() {

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        //load the login model
        $this->load->model('login_model');

        //get the posted values
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");

        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            //validation fails
            $this->load->view('login_view');
        } else {
            //validation succeeds
            if ($this->input->post('btn_login') == "Login") {
                //check if username and password is correct
                $usr_result = $this->login_model->get_user($username, $password);
                if ($usr_result > 0) { //active user record is present
                    
                    $this->load->model('user_model');
                    $user = new User_model();
                    $user = $this->user_model->get_user($username);
                   
                    //echo "<pre>";$v = $user[0]->fname;print_r($v);echo gettype($v);die;

                    //set the session variables
                    $sessiondata = array(
                        'user_id' => $user[0]->id,
                        'username' => $user[0]->username,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);

                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('users/login');
                }
            } else {
                redirect('users/login');
            }
        }
    }

}
