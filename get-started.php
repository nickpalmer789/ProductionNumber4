<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        //Include the header content
        include('templates/headercontent.php')
    ?>
</head>

<body>
    <?php
	
        //Include the navbar content
        include('templates/navbar.php');
 
        $db = mysqli_connect("localhost:3306","root","password","planit");	
        
        if($db === false) {
            //Print an error if the database can't be reached
            //TODO Add better erro printing to form
            echo "<p>Cannot connect to database!</p>";
        } else {
            session_start();        

            if($_SERVER["REQUEST_METHOD"] == "POST") {

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
                        header("location: dashboard.php");
            
                    } else {
                        //Username already taken print an error
                        echo "<p>Username already taken!</p>";
                    }
                } else {
                    //The password fields do not match. Print an error. 
                    echo "<p>Passwords don't match!</p>";
                }
            }

        }
        
	
    ?>

    <div class="container-fluid">
        <form action="" method="post">
            <div class="imgcontainer">
                <img src="assets/icons/planiticon.png" alt="Planit" class="avatar img-small">
                <h2>This can change to a create account page since there is a login modal built into the navbar. Maybe have a note that says existing users login at the top, new users fill this stuff in etc</h2>
            </div>
                
            <label for="usr"><b>First Name</b></label>
            <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" required>

            <label for="usr"><b>Last Name</b></label>
            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" required>
            
            <label for="usr"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
    
            <label for="usr"><b>Username</b></label>
            <input type="text" class="form-control" placeholder="Enter Username" name="username" required>

            <label for="pwd"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                
            <label for="pwd"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>    
        </form>



    </div>
        <?php
            include('templates/footerCopy.php');
        ?>
        <?php
            include('templates/footerScripts.php');
        ?>
</body>

</html>

