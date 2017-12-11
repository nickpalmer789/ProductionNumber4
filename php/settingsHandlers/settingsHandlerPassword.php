<?php
    include('../session.php');

    $db = mysqli_connect("localhost:3306","root","password","planit");  
                
    if($db === false) {
        //Print an error if the database can't be reached
        //TODO Add better error printing to form
        echo "<p>Cannot connect to the database!</p>";
    } else {
        if(htmlspecialchars($_POST['newpassword1'])=="" and htmlspecialchars($_POST['newpassword2'])==""){
            header("location: /content/settings.php#c2");
        } else {
            if($_POST['newpassword1']==$_POST['newpassword2']) {
                $query = "SELECT hashed_password FROM users WHERE username = '{$_SESSION['login_user']}'";
                $result = mysqli_query($db,$query);
                $oldpass = mysqli_fetch_row($result);
                if(htmlspecialchars($_POST['oldpassword'])==$oldpass[0]) {
                    $name=htmlspecialchars($_POST['newpassword1']);
                    echo $name;
                    $sql = "UPDATE users SET hashed_password = '$name' WHERE username = '{$_SESSION['login_user']}';";
                    echo $sql;
                    if ($db->query($sql) === TRUE) {
                        echo "Record updated successfully";
                        #$_SESSION['login_user'] = $name;
                    } else {
                        echo "Error updating record: " . $db->error;
                    }
                    header("location: /content/settings.php");
                } else {
                    echo "Old password incorrect.";
                }
            } else {
                echo "usernames don't match!";
            }
        }
    }
?>
