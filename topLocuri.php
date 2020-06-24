 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Romania frumoasa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="file1.js"></script>
</head>
<body>
<nav class="navbar navbar-default"  id="navbar1">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bran David</a>
    </div>
    <ul class="nav navbar-nav">
      <li> <a href="index.php"> Pagina de start</a></li>
      <li class="active"><a href="topLocuri.php">Top Locuri</a></li>
      <li><a href="login.php">Admin</a></li>

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
<button id="button1" onclick="buttonShow()" value="true"> Ascunde Meniu </button>


 <?php
 require_once 'QuiresSQL.php';
//                    $con=mysqli_connect('localhost','root','','david_bran');
//                    $sql="SELECT * FROM `zone_turistice`";
//                    $result = mysqli_query($con, $sql) or die(mysqli_error());
                    $select=new QuiresSQL();
                    $result=$select->selectTable("zone_turistice");
                    // se selecteaza fiecare linie din tabel
                    while($row = mysqli_fetch_array( $result)){
                        echo'<table class="table table-bordered">';
                        $id=$row['id'];
                        $nume=$row['nume'];
                        $descriere=$row['descriere'];
                              
                        $img=$row['imagine'];
                        echo'<tr><td style="font-size: 20px;">'.$nume.'</td></tr>
                             <tr><td style="color: #21a51e;font-size: 15px;text-align: left;">'.$descriere.'</td></tr>
                             <tr><td><img src="./imagini/'.$img.'" width="200px"/></td></tr>
                                    '; 
                    }
                    echo '</table>';
                    echo '<br>';
     ?>
   
    </div>


</body>
</html>