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
        <div class="whitespace"> </div>

        <div class="calendarspacing">
            <h1 align="left">
                <font size="7">My Calendar</font>
            </h1>
        </div>

        <div class="row">

            <div class="col-sm-8" align="center">

                <div class="calendarspacing">
                    <div class="totallyacalendar">
                        this is a calendar
                    </div>
                </div>

            </div>

            <div class="col-sm-4" align="center">

                <table class="table">
                    <thead>
                        <tr>
                            <th>My Tasks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Do the project</td>
                        </tr>
                        <tr>
                            <td>Make it not incomplete</td>
                        </tr>
                        <tr>
                            <td>This probably won't be a table at the end</td>
                        </tr>
                        <tr>
                            <td>It just looks nice</td>
                        </tr>
                    </tbody>
                </table>

                <div class="whitespace"> </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Completed Tasks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>I did the project</td>
                        </tr>
                        <tr>
                            <td>I made it not incomplete</td>
                        </tr>
                        <tr>
                            <td>Firetruck</td>
                        </tr>
                        <tr>
                            <td>Rocks</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>








        <?php
        include('templates/footerCopy.php');
      ?>



            <?php
      include('templates/footerScripts.php');
    ?>
</body>

</html>