<?php
    session_start();
    
    $db = mysqli_connect("localhost","root","password","planit");    
    
    if($db == false) {
        exit("Unable to connect to db.");
    }    

    //Attempt to get the session information about the user
    $user_check = $_SESSION["login_user"];
    $sessionQuery = "SELECT username FROM users WHERE username = '$user_check'";

    $ses_sql = mysqli_query($db, $sessionQuery);
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

    $login_session = $row['username'];

    //Redirect to the login page if the session is not valid
    if(!isset($_SESSION["login_user"])) 
    {
        header("location: ../index.php");
    }

?>
