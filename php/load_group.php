<!-- Load the group names in a table -->
<?php
    include("session.php");

    $username = $_SESSION["login_user"];
    $query = "SELECT groups.group_id, group_name FROM groups JOIN groups_join_users ON groups.group_id=groups_join_users.group_id WHERE username = '$username'";

    $resultset = mysqli_query($db, $query);
    echo "<table class=\"table\">";
    echo "<tr>";
    echo "<th>Group Name</th>";
    echo "<th>Leave Group</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) {
        echo "<tr>";
        echo "<td>$row[1]</td>";
        echo "<td><input type=\"submit\" class=\"button\" id = \"leave_group\" name=\"".$row[0]."\" value=\"Leave Group\"/></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<script src=\"../js/leave_group_handler.js\" type=\"text/javascript\" ></script>";
?>
