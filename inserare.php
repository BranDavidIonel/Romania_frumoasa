<?php include_once 'header.php' ?>
<?php
 require 'QuiresSQL.php';
 //nu stiu sigur daca este sesiune
//if(isset($_SESSION['admin'])){
if(isset($_POST['submit'])){
    $nume = $_POST['nume'];
    print_r($_FILES['imagini']['name']);
    $descriere = $_POST['descriere'];
    $images=$_FILES['imagini'];
    //test
   // print_r($_FILES['imagini']);
    $nrImg=count($_FILES['imagini']['name']);
    //concatenez intr-o varibila str toate imaginile separate prin virgula
    $strImages='';
    if(!empty($images)){
        for($i=0;$i<$nrImg;$i++){
        $path = "imagini/".basename($_FILES['imagini']['name'][$i]);
        move_uploaded_file($_FILES['imagini']['tmp_name'][$i], $path);
        //concat
        $strImages=$strImages.$_FILES['imagini']['name'][$i].',';
        }
    }
   // $pozan= $poza['name'];
    $inserare=new QuiresSQL();
//    $con=mysqli_connect('localhost','root','','david_bran');
//    $sql = "INSERT INTO `zone_turistice` (`nume`, `descriere`, `imagine`) VALUES('$nume','$descriere',  '$pozan')";
//    mysqli_query($con, $sql);
//     
    $strImages=mb_substr($strImages, 0, -1); 
    $inserare->insertSql("zone_turistice", $nume, $descriere, $strImages);
    //header("Location:adauga.php");

    echo "este inserat";
}
//}
echo '<a href="admin.php">inapoi</a><br/>';
?>
<?php include_once 'footer.php' ?>