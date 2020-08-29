 <?php include_once 'header.php';?>
 <?php
 require_once 'QuiresSQL.php';
//                    $con=mysqli_connect('localhost','root','','david_bran');
//                    $sql="SELECT * FROM `zone_turistice`";
//                    $result = mysqli_query($con, $sql) or die(mysqli_error());
                    $select=new QuiresSQL();
                    $result=$select->selectTable("zone_turistice");
                    // se selecteaza fiecare linie din tabel
                    while($row = mysqli_fetch_array( $result)){
                        echo'<table class="table table-bordered">';
                        $id=$row['id'];
                        $nume=$row['nume'];
                        $descriere=$row['descriere'];
                              
                        $img=$row['imagine'];
                        echo'<tr><td style="font-size: 20px;">'.$nume.'</td></tr>
                             <tr><td style="color: #21a51e;font-size: 15px;text-align: left;">'.$descriere.'</td></tr>
                             <tr><td><img src="./imagini/'.$img.'" width="200px"/></td></tr>
                                    '; 
                    }
                    echo '</table>';
                    echo '<br>';
     ?>
<?php include_once 'footer.php';?>   
   