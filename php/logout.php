<?php
    include('../php/session.php');

    $_SESSION = array();
    session_destroy();
    header("location: /index.php");

?>
