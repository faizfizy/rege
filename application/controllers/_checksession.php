<?php
$this->load->library('session');
if (!(isset($_SESSION['fname']) && $_SESSION['fname'] != '')) {
    header("location:http://rege.evernue.local/login");
    exit();
}
?>