<?php
    include_once('../php/load_db.php');

    function load_tasks(&$connection) {
        $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}'";
        $resultset = mysqli_query($connection,$query);
        if(!$resultset){
            echo ":( Something went wrong.<br><br>";
        }   
        //TODO Add functionality to show time of deadline 

        // Start table
        echo "<table class = \"table\">";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Description</th>";
        echo "<th>ETA</th>";
        echo "<th>Deadline</th>";
        echo "<th>End</th>"; 
        echo "</tr>";
        while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) {
            if($row[6] == 0){
                echo "<tr>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[5]</td>";
                $dateString = explode(" ", $row[3]);
                echo "<td>$dateString[0]</td>";
                echo "<td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Done!\"/></td>";
                echo "</tr>";
            }
        }

        //End Table
        echo "</table>";
    }

    
    function load_group(&$db) {
        
        $username = $_SESSION["login_user"];
        $query = "SELECT groups.group_id, group_name FROM groups JOIN groups_join_users ON groups.group_id=groups_join_users.group_id WHERE username = '$username'";

        $resultset = mysqli_query($db, $query);
        echo "<table class=\"table\">";
        echo "<tr>";
        echo "<th>Group Name</th>";
        echo "<th>View Calendar</th>";
        echo "<th>Leave Group</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) {
            echo "<tr>";
            echo "<td>$row[1]</td>";

            echo "<td><a class=\"btn btn-success\" href=\"../php/group_calendar_handler.php?group_name=$row[1]\">View Calendar</a></td>";
            echo "<td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Leave Group\"/></td>";

            echo "</tr>";
        }
        echo "</table>";
        echo "<script src=\"../js/leave_group_handler.js\" type=\"text/javascript\" ></script>";
        
    }

?>
