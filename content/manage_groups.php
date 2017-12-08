<!DOCTYPE html>
<html>
    <head>
        <?php
            //Include the header content
            include("../templates/headercontent.php");
        ?>
    </head>
    <body>
        <?php
            include("../templates/navbar.php");
            include("../php/session.php");
        ?>
        <h1 class="text-center">
            <font size="7">Manage Groups</font>
        </h1>
        <hr>
        <div class="row">
            <div class="col-md-9">
               <h3 class="text-center">My Groups</h3>
               <div class="table-responsive">
                    <!-- Load the current user's groups -->
                    <?php 
                        include("../php/load_group.php");
                    ?>
               </div>
            </div>
            <div class="col-md-3">
                <!-- Allow the user to create a new group -->
                <h3 class="text-center">Join or Create a Group</h3>
                <p class="text-center">Enter a group name. If it is unique a new group will be created. If the group already exists, you will be added to the group.</p>
                <form action="../php/new_groupHandler.php" method="post">
                    <label for="groupName"><b>Group Name</b></label>
                    <input type="text" class="form-control" placeholder="Enter Group Name" name="groupName" required>
                    
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="createGroup">Create or Join Group</button>
                </form>
            </div>
        </div>
    </body
</html>
