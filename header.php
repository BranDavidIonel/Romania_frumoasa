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
 <style>
     .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #C4F8D5;
    }
    
      /* Set height of the grid so .sidenav can be 100% (adjust as needed) 
    .row.content {height: 15%}
    */
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 5%;
      background-color: #C4F8D5;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #0CB742;
      color: black;
      padding: 15px;
    }
 </style>
</head>

<body>
<nav class="navbar navbar-default" id="navbar1">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Romania frumoasa</a>
    </div>
    <ul class="nav navbar-nav">
      <li> <a href="index.php"> Pagina de start</a></li>
      <li ><a href="topLocuri.php">Top Locuri</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Admin</a></li>
     </ul>
    
      <form method="POST" class="navbar-form navbar-left" action="cauta.php" >
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cauta" name="Cauta">
      </div>
      <button type="submit" class="btn btn-default" name="submitCauta">Submit</button>
    </form>
  </div>
</nav>

        <div class="container-fluid text-center">
            <button id="button1" onclick="buttonShow()" value="true">Ascunde meniu</button>    

    <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="https://www.google.com/maps/place/Valea+lui+Stan/@45.3670551,24.5887041,13.75z/data=!4m5!3m4!1s0x474cd9bca1c557bd:0xe58d0492570c597e!8m2!3d45.3657536!4d24.6210104">
          Valea lui Stan</a>
        </p>
      <p><a href="https://www.google.com/maps/place/St%C3%A2na+lui+Burnei/@45.5864073,24.7131155,13.25z/data=!4m13!1m7!3m6!1s0x474cc16b847290dd:0xe31ecf54f655331e!2zTXVuyJtpaSBGxINnxINyYciZ!3b1!8m2!3d45.5833333!4d24.7499999!3m4!1s0x0:0x847296e34796b8f5!8m2!3d45.5868638!4d24.7680438">
      Stana lui Burnei</a>
      </p>
    
    </div>
    <div class="col-sm-8 text-left"> 