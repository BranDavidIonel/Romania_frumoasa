<?php include_once 'header.php';?>
<?php
        require_once 'QuiresSQL.php';
        session_start();
        if(isset($_SESSION['admin'])){
            echo 'LOGAT';
            echo '<a href="logout.php">Logout</a>';
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $editeaza=new QuiresSQL();
//                $con=mysqli_connect('localhost','root','','david_bran');
//                $sql="SELECT * FROM `zone_turistice` WHERE `id`=$id";
//                $result = mysqli_query($con, $sql);
                $row= $editeaza->select_id_SQl($id);
                
            
            echo '
                <form action="editeaza.php?id='.$id.'" method="POST" enctype="multipart/form-data">
                    Nume: <input type="text" name="nume" value= "'.$row['nume'].'" /><br />
                    Descriere:<input type="text" name="descriere" value= "'.$row['descriere'].'" /><br />
                    <input type="file" name="poza" /><br />
                    <img src="./imagini/'.$row['imagine'].'" width="250px"/><br />
                        <input type="hidden" name="pozaveche" value="'.$row['imagine'].'"/>
                    <input type="submit" name="submit" value="Editeaza" />
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
                 header("Location: http://localhost/Romania_Frumoasa2/admin.php");
            }
            }
        }
        else{
            
            header("Location: admin.php");
                
        }
         
        
        ?>
<?php include_once 'footer.php';?>