<?php 
    
    $db = mysqli_connect("localhost","root","password","planit");

    if($db === false) {
        //Print an error if the databse can't be reached
        //TODO Add better error printing to form
        echo "<p>Cannot connect to the database!</p>";
    }

    $deleteID = $_REQUEST['id'];

    $query = "DELETE FROM group_tasks WHERE task_id=".$deleteID;

    $result = mysqli_query($db, $query);

    if(!$result) {
        echo "<p>Error completing query!</p>";
    }
?>
