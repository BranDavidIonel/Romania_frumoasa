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
 require 'QuiresSQL.php';
if(isset($_SESSION['admin'])){
if(isset($_POST['submit'])){
    $nume = $_POST['nume'];
    $descriere = $_POST['descriere'];
    $poza=$_FILES['poza'];
    
    if(!empty($poza)){
        $path = "imagini/".basename($poza['name']);
        move_uploaded_file($poza['tmp_name'], $path);
    }
    $pozan= $poza['name'];
    $inserare=new QuiresSQL();
//    $con=mysqli_connect('localhost','root','','david_bran');
//    $sql = "INSERT INTO `zone_turistice` (`nume`, `descriere`, `imagine`) VALUES('$nume','$descriere',  '$pozan')";
//    mysqli_query($con, $sql);
//      
    $inserare->insertSql("zone_turistice", $nume, $descriere, $pozan);
    //header("Location:adauga.php");
}
}
?>
</div>
</body>
</html>