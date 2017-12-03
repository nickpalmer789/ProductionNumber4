<?php
$connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

    $query = "SELECT * FROM calendar WHERE username = '{$_SESSION['login_user']}' ";
	$resultant = mysqli_query($connection, $query);

    $queryJSON = json_encode($resultant->fetch_all(PDO::FETCH_ASSOC));    
 
?>
