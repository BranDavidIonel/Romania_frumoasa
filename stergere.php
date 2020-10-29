<?php
//nu se salveaza datele in sesiune
//if(isset($_SESSION['admin'])){
if(isset($_GET['id'])){
    require_once 'QuiresSQL.php';
    $id=$_GET['id'];
    $bazePath = "imagini/";
//    $con=mysqli_connect('localhost','root','','david_bran');
////    $sql="DELETE FROM zone_turistice WHERE id = $id";
////    mysqli_query($con,$sql);
    $stergere= new QuiresSQL();
    $row=$stergere->select_id_zona($id);
    //selectez linia si sterg toate imaginele
    $arr_images=explode(',',$row['imagine']);
    foreach ($arr_images as $image){
        unlink($bazePath.$image);
    }
    $stergere->deleteZona($id);
    header("Location:admin.php");
    }
//}
?>
