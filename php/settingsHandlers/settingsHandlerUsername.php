<?php

session_start();
$db = mysqli_connect("localhost","root","password","planit");  
            
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


$message="Congratulations!";
            echo "<div class=\"modal fade\" id=\"settingsModal\" data-toggle=\"modal\" data-target=\"#settingsModal\" role=\"dialog\">";
                echo "<div class=\"modal-dialog\">";
                    echo "<div class=\"modal-content\">";
                        echo "<div class=\"modal-body\">";
                            #echo "<form action=\"/php/loginHandler.php\" method=\"post\">";
                                echo "<div class=\"imgcontainer\">";
                                    #<img src="../assets/icons/planiticon.png" alt="Planit" class="avatar">
                                    echo "<h2>";
                                        echo $message;
                                    echo "</h2>";
                                echo "</div>";

                                echo "<button type=\"button\" class=\"btn-danger btn-lg btn-block\" data-dismiss=\"modal\">Ok</button>";
                            #</form>
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
                                    
?>


