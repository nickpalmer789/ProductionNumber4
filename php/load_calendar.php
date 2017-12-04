<?php
    // Obtain a connection object by connecting to the db
    $connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

        
        
    $query = "SELECT * FROM calendar WHERE username = '{$_SESSION['login_user']}'";
    $resultset = mysqli_query($connection,$query);
    if(!$resultset){
        echo ":( Something went wrong.<br><br>";
    }   
        
    $queryJSON = json_encode($resultset->fetch_all(PDO::FETCH_ASSOC));

?>
