
   <!---- Get the group_id with the dropdown 
===============================================================
   -->

<?php
    $group = $_GET['id'];
    echo $group;
    include('../php/session.php');

    $connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno())
    {
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

    $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
    $groupid = "select group_id from groups where group_name = '$group'";
    $res1 = mysqli_query($connection, $groupid);
    $group_id = mysqli_fetch_row($res1);
    echo "groupid: ";
    echo $group_id[0];
    $query1 = "select * from group_tasks where group_id = $group_id[0]";
	$result3 = mysqli_query($connection, $query1);


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