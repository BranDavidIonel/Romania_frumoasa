<?php 
session_start();
include_once 'header.php';
require_once 'QuiresSQL.php';
?>

<?php
        //am incercat sa scot warning-uri
        //error_reporting(0);
        //error_reporting(E_ALL ^ E_WARNING);
        
        //&& $_POST["vercode"] == $_SESSION["vercode"]
 
        
      
         if(isset($_SESSION['admin'])){ 
       
            echo'<a href="adauga.php" class="btn btn-info btn-lg ">Adauga</a>';
            echo '<a href="logout.php" class="btn btn-info btn-lg pull-right" >Logout</a>';
     
                    $select=new QuiresSQL();
            
                    $result =$select->selectTable("zone_turistice");
                    echo '<table border="2" class="table table-bordered table-hover"">';
                    while($row = mysqli_fetch_array( $result)){
                        $id=$row['id'];
                        $nume=$row['nume'];
                        $descriere=$row['descriere'];    
                        $img=$row['imagine'];
                        
                        echo '<tr>
                                <td>'.$id.'</td>
                                <td>'.$nume.'</td>
                                <td>'.$descriere.'</td>
                                <td><a href="editeaza.php?id='.$id.'" class="btn btn-primary">Editeaza</a></td>
                                <td><a href="stergere.php?id='.$id.'" class="btn btn-danger" onclick=\"return confirm("Esti sigur ca vrei sa stergi?")\";>Stergere</a></td>
                            </tr>';  
                    }
                    echo'</table>';
            }
        
      /*
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
    */
  
       
 ?>
<?php include_once 'footer.php';?>