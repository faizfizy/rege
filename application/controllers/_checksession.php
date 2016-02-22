<?php

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
    redirect(base_url() . "users/login");
    exit();
}
?>