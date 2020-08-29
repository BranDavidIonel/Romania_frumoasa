<?php include_once 'header.php';?>
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
  <?php include_once 'footer.php';?>            
   














