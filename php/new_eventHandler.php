<?php
    $db = mysqli_connect("localhost", "root", "password", "planit");

    if($db === false) {
        //Print an error if the database can't be reached
        //TODO Add better error printing to form
        echo "<p>Cannot connect to the database!</p>";
    } else {
        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $eventType = mysqli_real_escape_string($db, $_POST['eventType']);

            $description = mysqli_real_escape_string($db, $_POST['description']);

            $startDate = mysqli_real_escape_string($db, $_POST['startDate']);

            $repeatDates = $_POST['repeatDates'];

            $endDate = mysqli_real_escape_string($db, $_POST['endDate']);

            $startTime = mysqli_real_escape_string($db, $_POST['startTime']);

            $endTime = mysqli_real_escape_string($db, $_POST['endTime']);

            $optionalLocation = mysqli_real_escape_string($db, $_POST['optionalLocation']);

            $repeatString = implode(" ",$repeatDates);

            $date = $startDate . " " . $startTime;
            $date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date);

            $date2 = $endDate . " " . $endTime;
            $date2 = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date2);
            
            $username = $_SESSION["login_user"];

            //Insert the new task into the database
            $taskQuery = "INSERT INTO calendar(username, description, item_name, start_time, end_time, optional_location, repeats) VALUES ('$username', '$description', '$eventType', '$date', '$date2', '$optionalLocation', '$repeatString')";
            //echo $taskQuery;

            $insertResult = mysqli_query($db, $taskQuery);

            if(!$insertResult) {
                echo "uh oh";
                echo $insertResult;
            } else {
                header("location: ../content/calendar.php");
            }
        }
    }
?>
