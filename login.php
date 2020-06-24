<!DOCTYPE html>
<html lang="en">

<head>
<title>Romania frumoasa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="file1.js" ></script>

</head>

<body>
<nav class="navbar navbar-default" id="navbar1">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bran David</a>
    </div>
    <ul class="nav navbar-nav" >
      <li > <a href="index.php"> Pagina de start</a></li>
      <li ><a href="topLocuri.php">Top Locuri</a></li>
      <li class="active"><a href="login.php">Admin</a></li>
	  <form class="navbar-form navbar-left" action="cauta.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cauta" name="Cauta">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </ul>
  </div>
</nav>

        <div class="container">
        <button id="button1" onclick="buttonShow()" value="true">Ascunde meniu</button>
<?php
            /*
            session_start();
            if(session_status()!=PHP_SESSION_ACTIVE){ 
            
            unset($_SESSION['admin']);
            session_write_close();
            }
             * 
             */
            if(!isset($_COOKIE['user'])&&!isset($_COOKIE['pass'])){
                echo '<form method="POST" action="admin.php">
                        <fieldset>
                        <legend>LOGARE</legend>
                            User:<input type= "text" name="user" id="user"/><br />
                            Password:<input type= "password" name="pass" id="pass"/><br />
                            Enter Code: <img src="captcha.php"><input type="text" name="vercode" /></br> 
                            <input type="checkbox" name="remember">Remember me<br/>
                            <input type="submit" name="login" value="logare" />     
                        </fieldset>
                      </form>';
            }
            
            else{
                echo '<form method="POST" action="admin.php">
                        <fieldset>
                        <legend>LOGARE</legend>
                            User:<input type= "text" name="user" id="user" value="'.$_COOKIE['user'].'"/><br />
                            Password:<input type= "password" name="pass" id="pass" value="'.$_COOKIE['pass'].'"/><br />
                            Enter Code: <img src="captcha.php"><input type="text" name="vercode" /></br> 
                            <input type="checkbox" name="remember">Remember me<br/>
                            <input type="submit" name="login" value="Logare" />     
                        </fieldset>
                      </form>';
            }
             
?>
             
        </div>
</body>

</html>

















