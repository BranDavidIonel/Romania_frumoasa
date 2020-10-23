<?php 
session_start();
include_once 'header.php';
require_once 'QuiresSQL.php';
?>
<?php

//check password and username with data from db
if(isset($_POST['login'])){
        //if(($_POST['user']!="")&&($_POST['pass']!="")){
       
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
                
                //echo "merge";
                //exit();
                echo '<script type="text/javascript">
                    window.location = "admin.php"
               </script>';
               // header("Location: http://localhost/romania_frumoasa2/admin.php");
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
               // header_remove("header.php");
             //exit(header("header.php"));
             
            }else {
                echo "<h1>Parola, username sau codul nu este corect! </h1>";
            }
} 
        
             
?>
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
                echo '<form method="POST" action="">
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
  <?php include_once 'footer.php';?>            
   














