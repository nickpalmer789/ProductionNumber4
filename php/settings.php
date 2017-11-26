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
    ?>
        <div class="container-fluid">
            <form action="/action_page.php" method="post">
                <div class="imgcontainer">
                    <img src="assets/icons/planiticon.png" alt="Planit" class="avatar">
                    <h2>Settings</h2>
                </div>

                <label for="usr"><b>Change Password</b></label>
                <input type="text" class="form-control" placeholder="Change Password" name="password" required>

                <label for="pwd"><b>Change avatar color</b></label>
                <input type="avatarcolor" class="form-control" placeholder="CAC" name="psw" required>
               
		<div class="dropdown">
  		<button onclick="myFunction()" class="dropbtn">Dropdown</button>
  		<div id="myDropdown" class="dropdown-content">
    			<a href="#"></a>
    			<a href="#"></a>
    			<a href="#"></a>
  		</div>
		</div>
		 
		<label for="pwd"><b>Viewable to Friends</b></label><br>
              	<input type="radio" name = "friend_preference" value="yes"> Yes &emsp;
                <input type="radio" name = "friend_preference" value="no"> No<br>
		
		<label for="pwd"><b>Visible to Public</b></label><br>
              	<input type="radio" name = "public_reference" value="yes"> Yes &emsp;
                <input type="radio" name = "public_reference" value="no"> No<br>
            	<label for="pwd"><b>Username Viewable</b></label><br>
              	<input type="radio" name = "preference" value="yes"> Yes &emsp;
                <input type="radio" name = "preference" value="no"> No<br>
            
            </form>

