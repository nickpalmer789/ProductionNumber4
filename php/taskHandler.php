<?php
	$query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
?>
    <p> My Tasks </p>
    <table class="table">
        <thead>
            <tr>
                <th>Task</th>
                <th>Date/time due</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($row = mysqli_fetch_array($res, MYSQLI_NUM))
            {
                if($row[6] == 0)
                {
    	?>
                <tr>
                    <td>
                        <?php echo $row[2]; ?>
                    </td>
                    <td>
                        <?php echo $row[3]; ?>
                    </td>
                </tr>
        <?php
                }
            }
    	?>
        </tbody>
    </table>

    <br>
<?php mysqli_data_seek($res, 0); ?>
    <p> Completed Tasks </p>
    <table class="table">
        <thead>
            <tr>
                <th>Task</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $alldone = True;
            while ($row = mysqli_fetch_array($res, MYSQLI_NUM))
            {
                if($row[6] == 1)
                {
                    $alldone = False;
    	?>
                <tr>
                    <td>
                        <?php echo $row[2]; ?>
                    </td>
                </tr>

        <?php	
                }
            }
                if($alldone)
                {
    	?>
                    <tr>
                        <td>
                            <?php echo "None, you've done NOTHING"; ?>
                        </td>
                    </tr>
        <?php
                }
    	?>
        </tbody>
    </table>
