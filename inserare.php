<?php include_once 'header.php' ?>
<?php
 require 'QuiresSQL.php';
 //nu stiu sigur daca este sesiune
//if(isset($_SESSION['admin'])){
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
    echo "este inserat";
}
//}
echo '<a href="admin.php">inapoi</a><br/>';
?>
<?php include_once 'footer.php' ?>