<?php
    $db = mysqli_connect("localhost:3306", "root", "password", "planit");

    if($db === false) {
        //Print an error if the database can't be reached
        //TODO Add better error printing to form
        echo "<p>Cannot connect to the database!</p>";
    } else {
        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskName = mysqli_real_escape_string($db, $_POST['taskName']);

            $description = mysqli_real_escape_string($db, $_POST['description']);

            $deadlineDate = mysqli_real_escape_string($db, $_POST['deadlineDate']);

            $deadlineTime = mysqli_real_escape_string($db, $_POST['deadlineTime']);

            $eta = mysqli_real_escape_string($db, $_POST['eta']);
            
            $date = $deadlineDate . " " . $deadlineTime;
            $date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date);
            
            $username = $_SESSION["login_user"];

            //Insert the new task into the database
            $taskQuery = "INSERT INTO tasks(username, task_name, deadline, description, ETA) VALUES ('$username', '$taskName', '$date', '$description', '$eta')";
            echo $taskQuery;
            $insertResult = mysqli_query($db, $taskQuery);

            if(!$insertResult) {
                echo $insertResult;
            } else {
                header("location: ../content/dashboard.php");
            }
        }
    }
?>
