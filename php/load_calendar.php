<?php
    // Obtain a connection object by connecting to the db
    $connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

        
        
    $calendarQuery = "SELECT * FROM calendar WHERE username = '{$_SESSION['login_user']}'";
    $calendarResult = mysqli_query($connection,$calendarQuery);
    if(!$calendarResult){
        echo ":( Something went wrong.<br><br>";
    }   

    $calendaerJSON = json_encode($calendarResult->fetch_all(PDO::FETCH_ASSOC));


    $tasksQuery = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}'";
    $taskResult = mysqli_query($connection, $tasksQuery);
    if(!$taskResult){
        echo ":( Something went wrong.<br><br>";
    }  

    $tasksJSON = json_encode($taskResult->fetch_all(PDO::FETCH_ASSOC));


?>
