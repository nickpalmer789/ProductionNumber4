<?php
    include('../php/session.php');

    session_destroy();

    header("location: /index.php");

    // Maybe do something else
    //echo ($_SESSION["login_user"]);

?>