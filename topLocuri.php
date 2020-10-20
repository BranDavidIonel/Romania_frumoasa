 <?php include_once 'header.php';?>
 <?php
 require_once 'QuiresSQL.php';
//                    $con=mysqli_connect('localhost','root','','david_bran');
//                    $sql="SELECT * FROM `zone_turistice`";
//                    $result = mysqli_query($con, $sql) or die(mysqli_error());
                    $select=new QuiresSQL();
                    //all de result
                    //$result=$select->selectTable("zone_turistice");
                    $rowsparpage=2;
                  
                    if(is_null($_REQUEST['p'])){
                         $p=0;
                    }else{
                         $page=$_REQUEST['p'];
                         $page=$page-1;
                         $p=$page*$rowsparpage;
                    }
                    $result=$select->selectPage($p);
                    // se selecteaza fiecare linie din tabel
                    echo'<table class="table table-bordered">';
                    while($row = mysqli_fetch_array( $result)){
                     
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
                              echo '<tr> <td><img src="./imagini/'.$image.'" width="400px"/></td></tr>';
                         }
                         echo '<tr><td><button data-toggle="modal" data-target="#myModal" id="'.$id.'" onclick="showDetails(this)"> Detalii</button> </td></tr>';
                        // echo '  </tr>';
                    }
                    echo '</table>';
                    //prev page
                    $prev_page=$_REQUEST['p']-1;
                    echo '<nav aria-label="...">
                         <ul class="pager">';
                    if($_REQUEST['p']>1){
                     echo '<li class="previous"><a href="topLocuri.php?p='.$prev_page.'"><span aria-hidden="true">&larr;</span>Back</a></li>';
                    }else{
                         echo '<li class="previous disabled"><a><span aria-hidden="true">&larr;</span>Back</a></li>';
                    }
                    //all page
                    $count=$select->count_Zone_Tutistice();
                  
                    //next page
                    $next_page=$_REQUEST['p']+1;
                    
                    $check=$p+$rowsparpage;
                    if($count>$check){
                    echo '<li class="next"><a href="topLocuri.php?p='.$next_page.'"><span aria-hidden="true">&rarr;</span>Next</a></li>';
                    }else{
                         echo '<li class="next disabled"><a><span aria-hidden="true">&rarr;</span>Back</a></li>';
                    }
                    echo '</ul>';
                    echo '<div id="pag_nr">
                    <ul class="pagination">';
                    $limit=$count/$rowsparpage;
                    $limit=ceil($limit);
                    for($i=1;$i<=$limit;$i++){
                         if($i==$_REQUEST['p']){
                         echo '<li class="active"><a>'.$i.' <span class="sr-only">(current)</span></a></li>';
                         }else{
                         echo '<li><a href="topLocuri.php?p='.$i.'">'.$i.'</a></li>'; 
                         }    
                    }
                    echo '</ul>
                         </div>
                         </nav>';
     ?>
<?php include_once 'footer.php';?>   
   