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
                              
                        $imgs=$row['imagine'];

                        echo'<tr><td style="font-size: 20px;">'.$nume.'</td></tr>
                             <tr><td style="color: #21a51e;font-size: 15px;text-align: left;">'.$descriere.'</td></tr>
                           
                                    ';
                         $imagesSplit= explode(',', $imgs);
                         //echo '<tr>';   <tr><td><img src="./imagini/'.$img.'" width="200px"/></td></tr>
                         foreach ($imagesSplit as $image) { 
                              echo '<tr> <td><img src="./imagini/'.$image.'" width="400px"/><td></tr>';
                         }
                         echo '<tr><td><button data-toggle="modal" data-target="#myModal" id="'.$id.'" onclick="showDetails(this)"> Detalii</button> </td></tr>';
                        // echo '  </tr>';
                    }
                    echo '</table>';
                    echo '<br>';
     ?>
<?php include_once 'footer.php';?>   
   