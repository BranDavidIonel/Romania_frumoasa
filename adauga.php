<?php include_once 'header.php';
 require_once 'QuiresSQL.php';
?>
<?php
        //session_start();
            echo 'LOGAT';
 
            echo '<table align="center">
                <form action="inserare.php" method="POST" enctype="multipart/form-data">
                    <tr>
                    <td>Nume:</td>
                    <td><input type="text" name="nume"  class="form-control" /></td>
                    </tr>
                    <tr>
                    <td>Descriere:</td>
                    <td><textarea type="text"  name="descriere" rows="8" class="form-control" > </textarea></td>
                    </tr>
                    <td>Alte link-uri de legatura:</td>
                    <td><textarea type="text"  name="links_info" rows="2" class="form-control" > </textarea></td>
                    </tr>
                    <td>Locatie:</td>
                    <td><textarea type="text"  name="link_locatie" rows="2" class="form-control" > </textarea></td>
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