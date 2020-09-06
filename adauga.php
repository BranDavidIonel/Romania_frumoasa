<?php include_once 'header.php';?>
<?php
        session_start();
            echo 'LOGAT';
 
            echo '<table align="center">
                <form action="inserare.php" method="POST" enctype="multipart/form-data">
                    <tr>
                    <td>Nume:</td>
                    <td><input type="text" name="nume"  class="form-control" /></td>
                    </tr>
                    <tr>
                    <td>Descriere:</td>
                    <td><input type="text" name="descriere"  class="form-control" /></td>
                    </tr>                 
                    <td>Rasfoieste:</td>
                    <td><input type="file" name="imagini[]" class="form-control"  multiple /></td>
                    </tr>
                    <td><input type="submit" name="submit" value="Adauga"/> <td>
                </form>
                </table>';
                       echo '<a href="admin.php" class="btn btn-primary">inapoi</a><br/>';
                       echo '<a href="logout.php" class="btn btn-primary">Logout</a>';
        ?>
<?php include_once 'footer.php';?>