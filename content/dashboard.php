<!DOCTYPE html>
<html>
    <head>
        <?php
            //Include the header content
            include('../templates/headercontent.php')
        ?>
    </head>
    <body>
	    <?php
		    include('../templates/navbar.php');	
            include('../php/session.php');
	    ?>
        <div class="container-fluid">
            <h1><font size="7">My Dashboard</font></h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <?php
                            include('../php/load_tasks.php');
                        ?>
                    </div>
                    <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#taskModal">Add New Task</button>
                    <!--Start Modal-->
                    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Create New Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>    
                                </div>
                                <div class="modal-body">
                                    <!--Start form for new task-->
                                    <form action="../php/new_taskHandler.php" method="post">
                                        <label for="taskName"><b>Task Name</b></label>
                                        <input type="text" class="form-control" placeholder="Enter Task Name" name="taskName" required>
                                        
                                        <label for="description"><b>Description</b></label>
                                        <input type="text" class="form-control" placeholder="Enter Task Description" name="description" required>
                                        
                                        <label for="deadlineDate"><b>Deadline Date</b></label>
                                        <input type="date" class="form-control" name="deadlineDate" required>

                                        <label for="deadlineTime"><b>Deadline Time</b></label>
                                        <input type="time" step="1" class="form-control" name="deadlineTime" required>
                                        
                                        <label for="eta"><b>ETA</b></label>
                                        <input type="text" class="form-control" name="eta" required>

                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="createTask">Create Task</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>

        </div>
        <?php
            include('../templates/footerCopy.php');
        ?>
        <?php
            include('../templates/footerScripts.php');
        ?>
    </body>
</html>
