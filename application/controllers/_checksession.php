<?php
if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
    header("location:http://rege.evernue.local/users/login");
    exit();
}
?>