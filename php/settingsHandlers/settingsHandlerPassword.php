<?php
$db = mysqli_connect("localhost:3306","root","password","planit");  
            
if($db === false) 
{
//Print an error if the database can't be reached
//TODO Add better error printing to form
    echo "<p>Cannot connect to the database!</p>";
} 
else{
    if(htmlspecialchars($_POST['newpassword1'])=="" and htmlspecialchars($_POST['newpassword2'])==""){
        echo "We aren't updating password!";
    }else{
        if ($_POST['newpassword1']==$_POST['newpassword2']){
            echo "Updating password...";
        #This is obtaining the old password to ensure the one entered is correct
            $query = "SELECT hashed_password FROM users WHERE username = '{$_SESSION['login_user']}'";
            $result = mysqli_query($db,$query);
            $oldpass = mysqli_fetch_row($result);
            echo $oldpass[0];
            
            if(htmlspecialchars($_POST('oldpassword'))==$oldpass[0]){
                $name=htmlspecialchars($_POST['newpassword2']);
                echo $name;
                $sql = "UPDATE users SET password = '$name' WHERE username = '{$_SESSION['login_user']}';";
                if ($db->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $db->error;
                }
                #header("location: /content/settings.php");
            }else{
                echo "Old password did not match";
            }
        }else{
            echo "passwords don't match!";
        }
    }
}
?>


