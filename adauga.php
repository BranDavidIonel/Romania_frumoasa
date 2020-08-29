<?php include_once 'header.php';?>
<?php
        session_start();
            echo 'LOGAT';
 
            echo '<table align="center">
                <form action="inserare.php" method="POST" enctype="multipart/form-data">
                    <tr>
                    <td>Nume:</td>
                    <td><input type="text" name="nume" /></td>
                    </tr>
                    <tr>
                    <td>Descriere:</td>
                    <td><input type="text" name="descriere" /></td>
                    </tr>                 
                    <td>Rasfoieste:</td>
                    <td><input type="file" name="poza" /></td>
                    </tr>
                    <td><input type="submit" name="submit" value="Adauga"/> <td>
                </form>
                </table>';
                       echo '<a href="admin.php">inapoi</a><br/>';
                       echo '<a href="logout.php">Logout</a>';
        ?>
<?php include_once 'footer.php';?>