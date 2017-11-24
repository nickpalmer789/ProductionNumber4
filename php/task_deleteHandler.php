<?php 
    
    $db = mysqli_connect("localhost:3306","root","password","planit");

    if($db === false) {
        //Print an error if the databse can't be reached
        //TODO Add better error printing to form
        echo "<o>Cannot connect to the database!</p>";
    }

    $deleteID = $_REQUEST['id'];

    $query = "DELETE FROM tasks WHERE task_id=".$deleteID;

    $result = mysqli_query($db, $query);

    if(!$result) {
        echo "<p>Error completing query!</h4>";
    }
    include("../content/dashboard.php");
?>
