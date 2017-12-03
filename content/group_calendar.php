<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        //Include the header content
        include('../templates/headercontent.php');
        include('../php/session.php');
        include('../templates/navbar.php');
        include('../php/load_calendar2.php'); 
        $group = "Group";
        $db = mysqli_connect("localhost:3306","root","password","planit");  
        $query = "SELECT group_name FROM (SELECT group_id FROM groups_join_users WHERE username = '{$_SESSION['login_user']}') as current_user_groups JOIN groups ON current_user_groups.group_id = groups.group_id;";
        $resultset = mysqli_query($db,$query);
        
    ?>
</head>

<body>

    <div class="container-fluid">
        <h1 align="left">
            <font size="7"> <?php echo $group; ?> Calendar </font>
        </h1>
        <?php
        echo "<div class=\"col-xs-6\" id=\"groups\"><button class=\"btn btn-success special-btn dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> Groups </button>";
        ?>
<!--        				<form action="../php/settingsHandlers/group_calendar_handler.php" method="post">-->

        <?php
        $allgroups="All Groups";
		echo "<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\" name = \"selectedgroup\" id=\"groupSelect\">";
		echo "<a class=\"dropdown-item\" name = \"group\" href=\"/php/group_calendar_handler.php?id=$allgroups\">All groups</a>";
        echo $count;
        while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) 
		{
		    echo "<a class=\"dropdown-item\" name = \"group\" href=\"/php/group_calendar_handler.php?id=$row[0]\">$row[0]</a>";
		    
		}
		echo "</div></div></div>"; //ends row, button, dropdown items divs
        ?>
<!--        </form>-->
        <div class="row">
            <div class="col-sm-8" align="center">
                <div id="calendar">
                    <!-- Full calendar js uses this spot -->
                </div>
                <br>
                <div>
                    <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#taskModal">Add Event</button>
                    <!--Start event Modal-->
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
                                    <!--Start form for new event-->
                                    <form action="../php/new_taskHandler.php" method="post">
                                        <label for="taskName"><b>Type (eg. class/work/etc)</b></label>
                                        <input type="text" class="form-control" placeholder="Enter Type" name="type" required>
                                        
                                       
                                        <label for="description"><b>Description</b></label>
                                        <input type="text" class="form-control" placeholder="Enter Event Description" name="description" required>

                                        <label for="startDate"><b>Start Date</b></label>
                                        <input type="date" class="form-control" name="startDate" required>
                                        
                                        <label for="repeats>"><b>Select days event repeats</b></label>
                                        <br>
                                        <label class="checks">Sun</label><input type="checkbox">
                                        <label class="checks">Mon </label><input type="checkbox">
                                        <label class="checks">Tue</label><input type="checkbox">
                                        <label class="checks">Wed</label><input type="checkbox">
                                        <label class="checks">Thur</label><input type="checkbox">
                                        <label class="checks">Fri</label><input type="checkbox">
                                        <label class="checks">Sat</label><input type="checkbox">
                                        
                                        <br>
                                        <label for="endDate"><b>End Date</b></label>
                                        <input type="date" class="form-control" name="endDate" required>

                                        <label for="startTime"><b>Start Time</b></label>
                                        <input type="time" class="form-control" name="startTime" required>
                                        <label for="startTime"><b>End Time</b></label>
                                        <input type="time" class="form-control" name="endTime" required>


                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="createTask">Add Task</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End event Modal-->
                </div>
            </div>
            <div class="col-sm-4" align="center">
                <?php
                        include('../php/taskHandler.php');
                    ?>
            </div>
            <script src="../js/task_deleteHandler_calendar.js"></script>
        </div>
        <?php
                include('../templates/footerCopy.php');
            ?>
    </div>
    <?php
            include('../templates/footerScripts.php');
        ?>
</body>
<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '2017-11-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php
                    echo $tasks;
                    
                if(!$tasks == "")
                    echo ",";
                echo $calendar;
                ?>
            ]
        });

    });

</script>

</html>
