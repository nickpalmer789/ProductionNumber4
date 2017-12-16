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
       // include('../php/session.php');           
            
    ?>
    <div class="container">
        <h1 class="text-center">
            <font size="7">Dashboard</font>
        </h1>
        <hr>
        <div class="row">
            <div class="col-md-9">
                <!--Show tasks table-->
                <h3 class="text-center">My Tasks</h3>
                <div class="table-responsive">
                    <?php
                        load_tasks($connection);
                    ?>
                </div>
                <script src="../js/task_deleteHandler.js"></script>
                <button id = "new_task_button" class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#taskModal">Add New Task</button>
                <!--Start Modal-->
                <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Create N<a href="../mandala/index.html">e</a>w Task</h5>
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
                                    <input type="text" class="form-control" placeholder="Enter Task Description" id = "describe" name="description" required>

                                    <label for="deadlineDate"><b>Deadline Date</b></label>
                                    <input type="date" class="form-control" name="deadlineDate" required>

                                    <label for="deadlineTime"><b>Deadline Time</b></label>
                                    <input type="time" step="1" class="form-control" name="deadlineTime" required>

                                    <label for="eta"><b>ETA</b></label>
                                    <input type="text" class="form-control" name="eta" required>

                                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="createTask">Create Task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
            </div>
            <div class="col-md-3" align='right'>
                <!-- Tiny Calendar -->
                <?php 
                    include('../php/tiny_calendar.php');
                ?>
                <hr>
                <!--Pomodoro timer -->
                <script src="../js/pomodoro.js"></script>
                <h3 class="text-center">Pomodoro Timer</h3>
                <br>
                <h1 class="text-center" id="timer-text">00:00</h1>
                <br>
                <h5 class="text-center" id="timeIndicator">Currently on Work Time</h5>
                <button class="btn btn-block btn-top btn-info" id="toggleWork">Switch To Break Time</button>
                <button class="btn btn-block btn-top btn-success" id="pauseBtn">Start Timer</button>
                <button class="btn btn-block btn-top btn-primary" id="restartBtn">Restart Timer</button>
                <hr>
                <label for="workTime">Work Time</label>
                <input type="text" id="workTime" min=1 max=60 value="25" class="form-control">
                <label for="breakTime">Break Time</label>
                <input type="text" id="breakTime" min=1 max=60 value="5" class="form-control">
                <button class="btn btn-block btn-success" id="updateBtn">Update Timer</button>
            </div>
        </div>
        <?php
            include('../templates/footerCopy.php');
          ?>
    </div>
    
    <?php
        include('../templates/footerScripts.php');
    ?>
</body>

</html>
