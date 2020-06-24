<!DOCTYPE html>
<html lang="en">

<head>
<title>Romania frumoasa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bran David</a>
    </div>
    <ul class="nav navbar-nav">
      <li > <a href="index.php"> Pagina de start</a></li>
      <li ><a href="topLocuri.php">Top Locuri</a></li>
      <li  class="active"><a href="login.php">Admin</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
	 <form class="navbar-form navbar-left" action="cauta.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cauta" name="Cauta">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</nav>

    <div class="container"> 
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
</div>
</body>
</html>