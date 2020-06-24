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
        //am incercat sa scot warning-uri
        //error_reporting(0);
        //error_reporting(E_ALL ^ E_WARNING);
        //session_start();
        //&& $_POST["vercode"] == $_SESSION["vercode"]
        session_start();
        if(isset($_POST['login']))
        if(($_POST['user']!="")&&($_POST['pass']!="")){
       
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $con=mysqli_connect('localhost','root','','romania_frumoasa');
        
        $query= mysqli_query($con,"SELECT * FROM login WHERE user_name='".$username."'AND password='".$password."'" );
        $numerows= mysqli_num_rows($query);
        //trece in $row numele si parola din baza de date
        $username2="";
        $password2="";
        while($row= mysqli_fetch_assoc($query)){ 
                $username2=$row['user_name'];
                $password2=$row['password'];
            }
         
            if($_POST['user']==$username && $_POST['pass']==$password2 /*&& $_POST["vercode"] == $_SESSION["vercode"]*/){ 
                $_SESSION['user']=$_POST['user']; 
                $_SESSION['admin']=1;
                
           
                if(!empty($_POST["remember"])){
                    echo "merge";
                setcookie("user",$_POST['user'], time()+(10*365*24*60*60));//timpul pt setcookie
                setcookie("pass",$_POST["pass"], time()+(10*365*24*60*60));
                
            }else{
                if(isset($_COOKIE["user"])){
                    setcookie("user","");
                }
                if(isset($_COOKIE["pass"])){
                    setcookie("pass","");
            }
            }
                
                
               header("localhost/Romania_Frumoasa2/admin.php");
            }else {
                echo "<h1>Parola, username sau codul nu este corect! </h1>";
            }
          } else {
              echo "<h1>Nu ati trecut nimic la username sau parolo!</h1>";
          }
      
            if(isset($_SESSION['admin'])){ 
       
            echo'<a href="adauga.php">Adauga</a><br>';
            echo 'LOGAT';
            echo '<a href="logout.php">Logout</a>';
     
            $con=mysqli_connect('localhost','root','','romania_frumoasa');
                    $sql="SELECT * FROM `zone_turistice`";
                    $result = mysqli_query($con, $sql) or die(mysqli_error());
                    echo '<table border="1" width="500px">';
                    while($row = mysqli_fetch_array( $result)){
                        $id=$row['id'];
                        $nume=$row['nume'];
                        $descriere=$row['descriere'];    
                        $img=$row['imagine'];
                        
                        echo"<tr>
                                <td>$id</td>
                                <td>$nume</td>
                                <td>$descriere</td>
                                <td><a href='editeaza.php?id=$id'>Editeaza</a></td>
                                <td><a href='stergere.php?id=$id' onclick=\"return confirm('Esti sigur ca vrei sa stergi?')\";>Stergere</a></td>
                            </tr>";  
                    }
                    echo'</table>';
            }
        
      
          if(isset($_COOKIE['user'])and isset($_COOKIE['pass']))
          {
              $user=$_COOKIE['user'];
              $pass=$_COOKIE['pass'];
              echo "<script>
             document.getElementById('user').value='$user';
             document.getElementById('pass').value='$pass';
                 </script>";
          } else{
$myuser="admin";
$mypass="pass";
if(isset($_POST['login']))
{
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    if($user == $myuser and $pass==$mypass){
        //daca sa apasat remember 
        if(isset($_POST['remember']))
            {
        setcookie('user',$user,time()+60*60*7);
        setcookie('pass',$pass,time()+60*60*7);
        session_start();
        $_SESSION['user']=$user;
        //header("location:admin.php");
        }
    }else{
     //  echo "parola nu este buna ca sa putem seta cookie";
    }
}else{
      //header("location:admin.php") ;
    // echo "nu sa trecut nimica in formular";
    }
  }
       
 ?>
</div>
</body>
</html>