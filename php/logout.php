<?php
    include('../php/session.php');

    //session_unset();
    $_SESSION = array();
    session_destroy();
    $_SESSION["logged_in"] = FALSE;
    header("location: /index.php");

?>
