<?php
//nu se salveaza datele in sesiune
//if(isset($_SESSION['admin'])){
if(isset($_GET['id'])){
    require_once 'QuiresSQL.php';
    $id=$_GET['id'];
//    $con=mysqli_connect('localhost','root','','david_bran');
////    $sql="DELETE FROM zone_turistice WHERE id = $id";
////    mysqli_query($con,$sql);
    $stergere= new QuiresSQL();
    $stergere->deleteZona($id);
    header("Location:admin.php");
    }
//}
?>
