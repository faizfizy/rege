<?php

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
    $this->session->set_userdata('forbidden', 'yes');
    redirect(base_url() . "users/login");
    exit();
}
?>