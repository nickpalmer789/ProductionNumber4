<?php
include('../session.php');

$db = mysqli_connect("localhost:3306","root","password","planit");  
            
if($db === false) 
{
//Print an error if the database can't be reached
//TODO Add better error printing to form
    echo "<p>Cannot connect to the database!</p>";
} 
else{
    if(htmlspecialchars($_POST['newusername1'])=="" and htmlspecialchars($_POST['newusername2'])==""){
        header("location: /content/settings.php#c1");
    }else{
        if ($_POST['newusername1']==$_POST['newusername2']){
            $name=htmlspecialchars($_POST['newusername1']);
            echo $name;
            $sql = "UPDATE users SET username = '$name' WHERE username = '{$_SESSION['login_user']}';";
            echo $sql;
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
                $_SESSION['login_user'] = $name;
            } else {
                echo "Error updating record: " . $db->error;
            }
            
            $sql = "UPDATE user_settings SET username = '$name' WHERE username = '{$_SESSION['login_user']}';";
            echo $sql;
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
                #$_SESSION['login_user'] = $name;
            } else {
                echo "Error updating record: " . $db->error;
            }
            
            header("location: /content/settings.php");
        }else{
            echo "usernames don't match!";
        }
    }
    
}
?>


