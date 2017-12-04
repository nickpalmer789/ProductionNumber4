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
    if(htmlspecialchars($_POST['phone1'])=="" and htmlspecialchars($_POST['phone2'])==""){
        header("location: /content/settings.php#c5");
    }else{
        if ($_POST['phone1']==$_POST['phone2']){
            $name=htmlspecialchars($_POST['phone1']);
            #echo $name;
            $sql = "UPDATE users SET phone_number = '$name' WHERE username = '{$_SESSION['login_user']}';";
            #echo $sql;
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
                #$_SESSION['login_user'] = $name;
            } else {
                echo "Error updating record: " . $db->error;
            }
            header("location: /content/settings.php#c5");
        }else{
            echo "phone numbers don't match!";
        }
    }
    
}
?>


