<?php
    $group = $_GET['group_name'];

    //include('../php/session.php');

    if(mysqli_connect_errno())
    {
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

    $groupQuery = "SELECT * FROM (SELECT username FROM groups_join_users JOIN groups ON groups_join_users.group_id=groups.group_id WHERE groups.group_name='$group') as group_users JOIN calendar ON group_users.username=calendar.username";

    $resultset = mysqli_query($db, $groupQuery);
    if(!$resultset) {
        echo "<p>Something went wrong!</p>";
    }
    
    $queryJSON = json_encode($resultset->fetch_all(PDO::FETCH_ASSOC));

    include("../content/group_calendar.php"); 
?>
