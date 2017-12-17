<?php
    include_once('../php/load_db.php');

    function tiny_calendar() {
        $now = getdate(time());
        $time = mktime(0,0,0, $now['mon'], 1, $now['year']);
        $date = getdate($time);
        $dayTotal = date('t', mktime(0,0,0,$date['mon'], 1,$date['year']));
        //Print the calendar header with the month name.
        print '<table style="margin: 0px auto;"><tr><td colspan="7"><strong>' . $date['month'] . '</strong><strong>    ' . $date['year'] . '</strong></td></tr>';
        for ($i = 0; $i < 6; $i++) {
            print '<tr>';
            for ($j = 1; $j <= 7; $j++) {
                $dayNum = $j + $i*7 - $date['wday'];
                //Print a cell with the day number in it.  If it is today, highlight it.
                print '<td';
                if ($dayNum > 0 && $dayNum <= $dayTotal) {
                    print ($dayNum == $now['mday']) ? ' style="background: #ccc;">' : '>';
                    print $dayNum;
                }
                else {
                    //Print a blank cell if no date falls on that day, but the row is unfinished.
                    print '>';
                }
                print '</td>';
            }
            print '</tr>';
            if ($dayNum >= $dayTotal && $i != 6)
                break;
        }
        print '</table>';
    }

    function load_tasks(&$db) {
        $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}'";
        $resultset = mysqli_query($db,$query);
        if(!$resultset){
            echo ":( Something went wrong.<br><br>";
        }   
        //TODO Add functionality to show time of deadline 

        // Start table
        echo 
            "<table class = \"table\">
             <tr>
                 <th>Name</th>
                 <th>Description</th>
                 <th>ETA</th>
                 <th>Due Date</th>
                 <th>Time</th>
                 <th>End</th>
             </tr>";
        while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) {
            if($row[6] == 0){
                //prepare the date
                $dateString = explode(" ", $row[3]);
                
                echo 
                    "<tr>
                         <td>$row[2]</td>
                         <td>$row[4]</td>
                         <td>$row[5]</td>                
                         <td>$dateString[0]</td>
                         <td>$dateString[1]</td>
                         <td><input type=\"submit\" class=\"button\" name=\"$row[0]\" value=\"Done!\"/></td>
                     </tr>";
            }
        }

        //End Table
        echo "</table>";
    }

    function load_tasks_small(&$db) {
        $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}' ";
        $res = mysqli_query($db, $query);
        if(!$res) {
            echo ":( Something went wrong.<br><br>";
        }
        echo 
            "<p> My Tasks </p>
            <table class=\"table\">
                <thead>
                <tr>
                    <th>Task</th>
                    <th>Date/time due</th>
                </tr>
                </thead>
            <tbody>";
        
        while ($row = mysqli_fetch_array($res, MYSQLI_NUM)){
            if($row[6] == 0){
                echo 
                    "<tr>
                         <td>$row[2]</td>
                         <td>$row[3]</td>
                         <td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Done!\"/></td>
                     </tr>";
            }
        }

        echo 
            "</tbody>
            </table>
            <br>";
        
        mysqli_data_seek($res, 0);
        
        echo 
            "<p> Completed Tasks </p>
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Task</th>
                    </tr>
                </thead>
                <tbody>";
        
        $alldone = True;
        while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
            if($row[6] != 0) {
                $alldone = False;
                echo 
                    "<tr>
                        <td>$row[2]</td>
                        <td><input type=\"submit\" class=\"del\" name=\"".$row[0]."\" value=\"Delete\"/></td>
                        <td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Not Done\"/></td>
                    </tr>";
            }
        }
        if($alldone){
            echo 
                "<tr>
                    <td>None, you've done NOTHING</td>
                </tr>";
        }
        
        echo 
            "   </tbody>
            </table>";
}

    function load_group_tasks(&$db, &$group) {
        $query = "SELECT * FROM group_tasks WHERE group_id = (SELECT group_id FROM groups WHERE group_name='$group')";
        
        $res = mysqli_query($db, $query);
        if(!$res) {
            echo ":( Something went wrong.<br><br>";
        }
        echo 
            "<p> Group Tasks </p>
            <table class=\"table\">
                <thead>
                <tr>
                    <th>Task</th>
                    <th>Date/time due</th>
                </tr>
                </thead>
            <tbody>";
        
        while ($row = mysqli_fetch_array($res, MYSQLI_NUM)){
            if($row[6] == 0){
                echo 
                    "<tr>
                         <td>$row[2]</td>
                         <td>$row[3]</td>
                         <td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Done!\"/></td>
                     </tr>";
            }
        }

        echo 
            "</tbody>
            </table>
            <br>";
        
        mysqli_data_seek($res, 0);
        
        echo 
            "<p> Completed Tasks </p>
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Task</th>
                    </tr>
                </thead>
                <tbody>";
        
        $alldone = True;
        while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
            if($row[6] != 0) {
                $alldone = False;
                echo 
                    "<tr>
                        <td>$row[2]</td>
                        <td><input type=\"submit\" class=\"del\" name=\"".$row[0]."\" value=\"Delete\"/></td>
                        <td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Not Done\"/></td>
                    </tr>";
            }
        }
        if($alldone){
            echo 
                "<tr>
                    <td>None, you guys done NOTHING</td>
                </tr>";
        }
        
        echo 
            "   </tbody>
            </table>";
}

    function load_group(&$db) {
        
        $username = $_SESSION["login_user"];
        $query = "SELECT groups.group_id, group_name FROM groups JOIN groups_join_users ON groups.group_id=groups_join_users.group_id WHERE username = '$username'";

        $resultset = mysqli_query($db, $query);
        echo 
            "<table class=\"table\">
             <tr>
                 <th>Group Name</th>
                 <th>View Calendar</th>
                 <th>Leave Group</th>
             </tr>";
        while($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) {
            echo 
                "<tr>
                     <td>$row[1]</td>
                     <td><a class=\"btn btn-success\" href=\"../content/group_calendar.php?group_name=$row[1]\">View Calendar</a></td>
                     <td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Leave Group\"/></td>
                 </tr>";
        }
        echo 
            "</table>
            <script src=\"../js/leave_group_handler.js\" type=\"text/javascript\" ></script>";
        
        
    }
    
    function build_group_dropdown(&$db) {
        //Get the group names
        $getGroupNames = "SELECT group_name FROM (SELECT group_id FROM groups_join_users WHERE username = '{$_SESSION['login_user']}') as current_user_groups JOIN groups ON current_user_groups.group_id = groups.group_id";

        $groupNames = mysqli_query($db, $getGroupNames);

        echo "<a class=\"dropdown-item\" name=\"group\" href=\"../content/manage_groups.php\">No Group</a>";

        //Print out all other group names as links
        while($row = mysqli_fetch_array($groupNames, MYSQLI_NUM)) {
            echo "<a class=\"dropdown-item\" name = \"group\" href=\"/content/group_calendar.php?group_name=$row[0]\">$row[0]</a>";
        }
    }

    function group_handler(&$db, &$group) {
        $groupQuery = "SELECT * FROM (SELECT username FROM groups_join_users JOIN groups ON groups_join_users.group_id=groups.group_id WHERE groups.group_name='$group') as group_users JOIN calendar ON group_users.username=calendar.username";

        $resultset = mysqli_query($db, $groupQuery);
        if(!$resultset) {
            echo "<p>Something went wrong!</p>";
        }

        $queryJSON = json_encode($resultset->fetch_all(PDO::FETCH_ASSOC));
        return $queryJSON;
    }

    function load_calendar(&$db) {
        
        $calendarQuery = "SELECT * FROM calendar WHERE username = '{$_SESSION['login_user']}'";
        $calendarResult = mysqli_query($db,$calendarQuery);
        if(!$calendarResult){
            echo ":( Something went wrong.<br><br>";
        }   

        return json_encode($calendarResult->fetch_all(PDO::FETCH_ASSOC));

    }

    function show_tasks(&$db) {
        $tasksQuery = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}'";
        $taskResult = mysqli_query($db, $tasksQuery);
        if(!$taskResult){
            echo ":( Something went wrong.<br><br>";
        }  

        $tasksJSON = json_encode($taskResult->fetch_all(PDO::FETCH_ASSOC));
        return $tasksJSON;
    }

    
?>
