<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      //Include the header content
      include('../templates/headercontent.php')
    ?>
        <?php
        include('../php/session.php');
        include('../templates/navbar.php');
        include('../php/load_calendar2.php'); 
        echo $rangeObj->start;
    ?>
</head>

<body>

    <div class="container-fluid">
        <h1 align="left">
            <font size="7">My Calendar</font>
        </h1>

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
                                    <form action="../php/new_eventHandler.php" method="post">
                                        <label for="eventType"><b>Type</b></label>
                                        <input type="text" class="form-control" placeholder="&quot;class/work/etc&quot;" name="eventType" required>
                                        
                                       
                                        <label for="description"><b>Description</b></label>
                                        <input type="text" class="form-control" placeholder="&quot;MATH 1234&quot;" name="description" required>

                                        <label for="startDate"><b>Start Date</b></label>
                                        <input type="date" class="form-control" name="startDate" required>
                                        
                                        <label for="repeats>"><b>Select days event repeats</b></label>
                                        <br>
                                        <label class="checks">Sun</label><input type="checkbox"  name="repeatDates[]" value="0"/>
                                        <label class="checks">Mon </label><input type="checkbox"  name="repeatDates[]" value="1"/>
                                        <label class="checks">Tue</label><input type="checkbox"  name="repeatDates[]" value="2"/>
                                        <label class="checks">Wed</label><input type="checkbox"  name="repeatDates[]" value="3"/>
                                        <label class="checks">Thur</label><input type="checkbox"  name="repeatDates[]" value="4"/>
                                        <label class="checks">Fri</label><input type="checkbox"  name="repeatDates[]" value="5"/>
                                        <label class="checks">Sat</label><input type="checkbox"  name="repeatDates[]" value="6"/>
                                        
                                        <br>
                                        <label for="endDate"><b>End Date</b></label>
                                        <input type="date" class="form-control" name="endDate" required>

                                        <label for="startTime"><b>Start Time</b></label>
                                        <input type="time" class="form-control" name="startTime" required>

                                        <label for="endTime"><b>End Time</b></label>
                                        <input type="time" class="form-control" name="endTime" required>

                                        <label for="optionalLocation"><b>Location</b></label>
                                        <input type="text" class="form-control" placeholder="&quot;Humanities Building&quot;" name="optionalLocation" required>


                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="createTask">Add Event</button>
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
