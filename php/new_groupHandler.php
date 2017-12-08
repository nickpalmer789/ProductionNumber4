<?php
    include("session.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
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
                header("location: ../content/manage_groups.php");
            }
        }
    }
    

?>
