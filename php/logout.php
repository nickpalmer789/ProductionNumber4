<?php
    include('../php/session.php');

    session_unset();
    session_destroy();
    $_SESSION["logged_in"] = FALSE;
    header("location: /index.php");

    // Maybe do something else
    //echo ($_SESSION["login_user"]);

?>