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
            <h1 align="left">
                <font size="7">My Calendar</font>
            </h1>

            <div class="row">
                <div class="col-sm-8" align="center">
                    <div class="calendarspacing">
                        <div class="totallyacalendar">
                            <p>this is a <del>calendar</del> box </p>
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
                    <br>
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
        </div>
        <?php
      include('templates/footerScripts.php');
    ?>
</body>

</html>