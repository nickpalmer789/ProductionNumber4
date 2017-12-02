<?php
$connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

    $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
    $tasks = ""; 
    while ($row = mysqli_fetch_array($res, MYSQLI_NUM))
    {
        if($row[6] == 0)
        {
            $tasks .= '{ start: \'';
            $tasks .= $row[3];
            #row[1] is username
            $tasks .= '\', end: \'';
            $tasks .= $row[3];
            $tasks .= '\', title: \'';
            $tasks .= $row[2];
            $tasks .= ' - ';
            $tasks .= $row[4];
            $tasks .= '\', color: \'bisque';
            $tasks .= '\' },';
        }

    }
    $tasks = rtrim($tasks, ',');

    $query = "SELECT * FROM calendar WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
    $calendar = "";
    while ($row = mysqli_fetch_array($res, MYSQLI_NUM))
    {
            $calendar .= '{ id: \'';
            $calendar .= $row[0];
            $calendar .= '\', start: \'';
            $calendar .= $row[4];
            #row[1] is username
            $calendar .= '\', end: \'';
            $calendar .= $row[5];
            $calendar .= '\', title: \'';        
            $calendar .= $row[3];
            $calendar .= ' - ';
            $calendar .= $row[2];
            $calendar .= '\' },';
        

    }
    $calendar = rtrim($calendar, ',');


    
?>