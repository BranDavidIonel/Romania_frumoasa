<?php include_once 'header.php';?>
<?php
        require_once 'QuiresSQL.php';
        session_start();
        if(isset($_SESSION['admin'])){
            echo 'LOGAT';
            
            echo '<br>';
            echo '<ul class="nav nav-pills nav-stacked">';
            echo '<li role="presentation"> <a  class="btn-sm btn-success " href="logout.php"><span class="glyphicon glyphicon-off"> <span>Logout</a> </li>';
            echo '<li role="presentation"> <a  class="btn-sm btn-success " href="admin.php"><span class="glyphicon glyphicon-menu-left"> </span> Back</a> </li>';
            echo '</ul>';
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $editeaza=new QuiresSQL();
//                $con=mysqli_connect('localhost','root','','david_bran');
//                $sql="SELECT * FROM `zone_turistice` WHERE `id`=$id";
//                $result = mysqli_query($con, $sql);  <div class="form-group">
                $row= $editeaza->select_id_SQl($id);
                
            
            echo '
                <form action="editeaza.php?id='.$id.'" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="usr">  Nume: </label>
                    <input type="text" class="form-control" name="nume" value= "'.$row['nume'].'" />
               
                <label for="usr">  Descriere: </label>
                   <textarea class="form-control" rows="5" class="form-control" name="descriere" value="'.$row['descriere'].'" >
                   '.$row['descriere'].'
                   </textarea> 
                    <input type="file" name="poza" />
                    <img src="./imagini/'.$row['imagine'].'" width="250px"/><br />
                        <input type="hidden" name="pozaveche" value="'.$row['imagine'].'"/>
                    <input  type="submit" name="submit" value="Editeaza" />
                  </div>
                </form><br /><br />
                ';
            if(isset($_POST['submit'])){
                
                $id = $_GET['id'];
                $nume = $_POST['nume'];
                $descriere = $_POST['descriere'];
                $poza = $_FILES['poza'];
                $pozaveche=$_POST['pozaveche'];
        
                
                if(!empty($poza['name'])){
                    $path = "imagini/".basename($poza['name']);
                    move_uploaded_file($path,$poza['tmp_name']);
                    $pozan=$poza['name'];
                }
                else{
                    $pozan=$pozaveche;
                }
                
//                $con=mysqli_connect('localhost','root','','david_bran');
//                $sql="UPDATE zone_turistice SET nume='$nume',descriere='$descriere',imagine='$pozan' WHERE id='$id'";
                $result = $editeaza->updateSQL($nume, $descriere, $pozan, $id);
                // header("Location: http://localhost/Romania_Frumoasa2/admin.php");
            }
            }
        }
        else{
            
            header("Location: admin.php");
                
        }
         
        
        ?>
<?php include_once 'footer.php';?>