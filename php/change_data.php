<?php
    include_once('../php/load_db.php');

    function log_in(&$db) {
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $username = mysqli_real_escape_string($db,$_POST['username']);
            $password = mysqli_real_escape_string($db,$_POST['password']);

            $verifyQuery = "SELECT username FROM users WHERE username = '$username' AND hashed_password = '$password'";
            $result = mysqli_query($db, $verifyQuery);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            //Check how many users there are with the given username
            $count = mysqli_num_rows($result);

            if($count == 1) {
                //Log the user in and redirect them to the dashboard
                $_SESSION["login_user"] = $username;
                header("location: /content/dashboard.php");
            } 
            else {
                //Incorrect username or password. Print an error
                echo "<p> Incorrect username or password!</p>";
                header("location: /content/login.php");
            }

        }
    }

    function log_out() {
        session_destroy();
        header("location: /content/index.php");
    }

    function create_user(&$db) {
        
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        $confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);            

        //Verify that password and confirmpassword are the same
        if($password == $confirmpassword) {

            //Verify that the entered username is unique
            $verifyQuery = "SELECT username FROM users WHERE username = '$username'";
            $result = mysqli_query($db,$verifyQuery);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            //Check how many users there are with the given username
            $count = mysqli_num_rows($result);
            if($count == 0) {
                //Create a new entry in the database for the user
                $userQuery = "INSERT INTO users(username, first_name, last_name, email, hashed_password, cryptosalt) VALUES ('$username', '$firstname', '$lastname', '$email', '$password', 00)";
                $settingsQuery = "INSERT INTO user_settings VALUES ('$username', 1, 1, 'default', 1, 0, 0)"; 

                $insertResult = mysqli_query($db, $userQuery);
                $insertResult = mysqli_query($db, $settingsQuery);

                //Put the username into the session vars
                $_SESSION['login_user'] = $username;

                //Send a new header to the client
                //header("location: /content/dashboard.php");

            } 
            
            else {
                //Username already taken print an error
                echo "<p>Username already taken!</p>";
            }
            
        }      
        
        else {
            //The password fields do not match. Print an error. 
            echo "<p>Passwords don't match!</p>";
        }
    }

    function add_task(&$db) {
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
        $insertResult = mysqli_query($db, $taskQuery);

        if(!$insertResult) {
            echo $insertResult;
        } 
        else {
            $_POST = array();
            //header("location: ../content/dashboard.php");
        }
    }

    function add_event(&$db) {
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
            $_POST = array();
        }
    }

    function join_group(&$db) {
        //User has submitted a group name
        //Start by checking if the group exists
        $groupName = mysqli_real_escape_string($db, $_POST["groupName"]);

        $groupQuery = "SELECT * from groups where group_name='$groupName'";

        $groupResult = mysqli_query($db, $groupQuery);

        //If it is an empty set, the name is unique
        $row_cnt = $groupResult->num_rows;

        //Variables to be used later
        $groupID = -1;
        $username = $_SESSION["login_user"];
        $alreadyInGroup = false;

        if($row_cnt == 0) {
            //Name is unique, create a new group
            $newGroupQuery = "INSERT INTO groups(group_name) VALUES ('$groupName')";

            $newGroupResult = mysqli_query($db, $newGroupQuery);
            
            //Check if something went wrong
            if(!$newGroupResult) {
                echo $newGroupResult;
            }
            
            //Insert the user into the group
            $groupID = mysqli_insert_id($db);

        } else {
            //Name is already in use. Join group
            $row = mysqli_fetch_assoc($groupResult);
            $groupID = $row["group_id"]; 

            $userInGroupQuery = "SELECT * FROM groups_join_users WHERE username='$username' AND group_id='$groupID'";

            $checkUserResult = mysqli_query($db, $userInGroupQuery);

            if($checkUserResult->num_rows != 0) {
                //The user is already in the group
                $alreadyInGroup = true;
            }
        }

        //
        if($alreadyInGroup == false) {
            $newGroupUserQuery = "INSERT INTO groups_join_users(group_id, username) VALUES ($groupID, '$username')";

            $newGroupResult = mysqli_query($db, $newGroupUserQuery);

            //Check if something went wrong
            if(!$newGroupResult) {
                echo $newGroupResult;
            } else {
                //header("location: ../content/manage_groups.php");
            }
        }
    }

    function leave_group(&$db) {
        $group_id = $_REQUEST['name'];

        $query = "DELETE FROM groups_join_users WHERE username = '{$_SESSION['login_user']}' AND group_id = ".$group_id.";";

        $result = mysqli_query($db, $query);

        if (!$result) {
            echo("<p>Error completing query!</p>");
        }
    }

    
    
?>