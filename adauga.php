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
</div>
</body>
</html>