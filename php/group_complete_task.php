<?php 
    
    $db = mysqli_connect("localhost","root","password","planit");

    if($db === false) {
        //Print an error if the databse can't be reached
        //TODO Add better error printing to form
        echo "<p>Cannot connect to the database!</p>";
    }

    $deleteID = $_REQUEST['id'];

    $comp = "SELECT complete FROM group_tasks WHERE task_id=".$deleteID;

    $thing = mysqli_query($db, $comp);

    $row = mysqli_fetch_array($thing, MYSQLI_NUM);

    if(!$row[0]){
        $query = "UPDATE group_tasks SET complete=1 WHERE task_id=".$deleteID;
    }
    else{
        $query = "UPDATE group_tasks SET complete=0 WHERE task_id=".$deleteID;
    }

    $result = mysqli_query($db, $query);

    if(!$result) {
        echo "<p>Error completing query!</p>";
    }
?>
