<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Include the header content
      include('templates/headercontent.php')
    ?>
    <!-- <link rel="stylesheet" type="text/css" href="groupViewStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>

  <body>
    <?php
      //Include the navbar content
      include('templates/navbar.php');
    ?>
        <div class="whitespace"> </div>

        <div class="calendarspacing row">
            <div class="col-xl-6">
                <label for="groups"><h1 align="left"> <font size="7">Groupname Calendar</font></h1></label>
            </div>
            <div align="right" class="dropdown col-xs-6" id="groups">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Groups
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Group1</a>
                    <a class="dropdown-item" href="#">Group2</a>
                    <a class="dropdown-item" href="#">Group3</a>
                  </div>
                </div>    
            </div>
        <div class="row">
            
            <div class="col-sm-8"  align="center">

                <div class="calendarspacing">
                    <div class="totallyacalendar"> 
                        this is a calendar 
                    </div>
                </div>

            </div>

            <div class="col-sm-4"  align="center">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Group Tasks</th>
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
                            <td>Meetings etc</td>
                        </tr>
                        <tr>
                            <td>Group things</td>
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

    </div>
    
    <?php
      include('templates/footerScripts.php');
    ?>
  </body>
</html>